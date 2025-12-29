class PinterestSessionsController < ApplicationController
  require 'rest-client'
  require 'pinterest-api'
  require 'net/https'

  $pin_selection_limit =3

  # Initiates the OAuth authentication process with Pinterest.
  # Constructs the authorization URL using client credentials and redirects the user to Pinterest for authentication.
  #
  # Environment Variables:
  # - PINTEREST_APP_ID: The Pinterest application client ID.
  # - PINTEREST_APP_SECRET: The Pinterest application secret key.
  # - PINTEREST_CALLBACK_URL: The callback URL to redirect after authentication.
  #
  # Redirects:
  # - Redirects the user to Pinterest's OAuth endpoint to request an authorization code.
  def create
    # create session
    @client_id = ENV["PINTEREST_APP_ID"];
    @secret_key = ENV["PINTEREST_APP_SECRET"];
    resource_uri = ENV["PINTEREST_CALLBACK_URL"];
    @code_call = "https://api.pinterest.com/oauth/?response_type=code&redirect_uri=#{resource_uri}&client_id=#{@client_id}&scope=read_public,write_public&state=768uyFys"
    redirect_to @code_call
  end

  def get_response_code
    @response_code = params[:code]
    generate_token
  end

  def generate_token
    client_id = ENV["PINTEREST_APP_ID"];
    secret_key = ENV["PINTEREST_APP_SECRET"];
    url = URI("https://api.pinterest.com/v1/oauth/token?client_id=#{client_id}&client_secret=#{secret_key}&grant_type=authorization_code&code=#{@response_code}")

    # Initializes a new Net::HTTP object for making HTTP requests to the specified host and port.
    # @param url [URI] The URI object containing the host and port information.
    # @return [Net::HTTP] An instance of Net::HTTP configured for the given host and port.
    http = Net::HTTP.new(url.host, url.port)
    http.use_ssl = true # The crucial part

    # Most of these headers are optional but I left them in for completion
    request = Net::HTTP::Post.new(url)
    request["User-Agent"] = 'PostmanRuntime/7.19.0'
    request["Accept"] = '*/*'
    request["Cache-Control"] = 'no-cache'
    request["Postman-Token"] = 'da019b5e-0b07-4801-957f-d21573874b2b,b4bd051a-0755-4ea3-a36a-dbc29de01e49'
    request["Host"] = 'api.pinterest.com'
    request["Accept-Encoding"] = 'gzip, deflate'
    request["Content-Length"] = '0'
    request["Connection"] = 'keep-alive'
    request["cache-control"] = 'no-cache'

    response = http.request(request)
    puts response.read_body

    PinterestAuthorization.create!(access_token: access_token, user_id: current_user.id)

    redirect_to pinterest_boards_path
  end

  def pinterest_boards
    access_token = current_user.pinterest_authorization.access_token
    @selected_pin_count = current_user.pinterest_pins.count
    @pin_selection_limit = $pin_selection_limit
    # get user information
    # response = RestClient.get "https://api.pinterest.com/v1/me?access_token=#{access_token}&fields=username,first_name,last_name" #we need username to request boards
    # parse_response = JSON.parse(response.body)
    # pinterest_username = parse_response["data"]["username"]
    # pinterest_id = parse_response["data"]["id"]

    #get boards:
    # board_response = RestClient.get "https://api.pinterest.com/v1/me/boards?access_token=#{access_token}"
    # @user_boards = JSON.parse(board_response.body) # this will get ALL of the users boards or filter through them as a collection with board_response.each etc

    #get pins
    # pins_response = RestClient.get "https://api.pinterest.com/v1/me/pins/?access_token=#{access_token}&fields=url,link,image"
    # @user_pins = JSON.parse(pins_response.body)

    #get pins for specific board
    # test_username = "awesomeuser"
    # test_boardname = "codetestboard2"

    # board_pin_response = RestClient.get "https://api.pinterest.com/v1/boards/#{test_username}/#{test_boardname}/pins/?access_token=#{access_token}&fields=image"
    # @board_pins = JSON.parse(board_pin_response.body)

    show_all_pins
    @selected_pins = PinterestPin.where(selected: true)

    render layout: "logged_in"
  end

  def get_user_info
    @user_info = JSON.parse("{\"data\": {\"id\": \"831266181129353045\", \"username\": \"awesomeuser\", \"first_name\": \"Awesome\", \"last_name\": \"User\"}}")
    @user_info_data = @user_info["data"]
  end

  def get_boards
    @user_boards = JSON.parse("{\"data\": [{\"id\": \"831266112410175790\", \"url\": \"https://www.pinterest.com/awesomeuser/codetestboard/\", \"name\": \"CodeTestBoard\"}, 
      {\"id\": \"831266112410175796\", \"url\": \"https://www.pinterest.com/awesomeuser/codetestboard2/\", \"name\": \"CodeTestBoard2\"}, 
      {\"id\": \"831266112410204944\", \"url\": \"https://www.pinterest.com/awesomeuser/codetestboard3/\", \"name\": \"CodeTestBoard3\"}]}")
    show_all_pins
  end
  
  def show_board_pins
    @username = params[:username]
    @board_name = params[:board_name]
    board_pins_response = RestClient.get "https://api.pinterest.com/v1/boards/#{params[:username]}/#{params[:board_name]}/pins/?access_token=#{access_token}"

    render layout: "logged_in"
  end

  def show_all_pins
    @all_pins = JSON.parse("{\"data\": [{\"id\": \"831266043706689689\", \"url\": \"https://www.pinterest.com/pin/831266043706689689/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689689/5057013306680724917/04d950c52d84fa9b0ac2eb43f997f6c8ae980f0a99f552d2720abef8df83bb34\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/09/fc/f5/09fcf5d2f07b7ad526e1eeaa6ca62374.jpg\", \"width\": 290, \"height\": 227}}}, {\"id\": \"831266043706689685\", \"url\": \"https://www.pinterest.com/pin/831266043706689685/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689685/5057013306680724917/13bba7d0688e1eadc65202cfcd48ac0fdac2bd5c153683bf01480134197789a6\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/69/9a/97/699a97466cdd0fee7090961aedf23f67.jpg\", \"width\": 500, \"height\": 500}}}, {\"id\": \"831266043706689683\", \"url\": \"https://www.pinterest.com/pin/831266043706689683/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689683/5057013306680724917/512c452d4bc6d59c683812426b2f18bd66d01862feb2ad01332111241cd8e64c\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/8d/bc/d0/8dbcd0883b77380562bbbfd522618fb7.jpg\", \"width\": 850, \"height\": 850}}}, {\"id\": \"831266043706689682\", \"url\": \"https://www.pinterest.com/pin/831266043706689682/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689682/5057013306680724917/7a38e4d75371449df522eebe2fa4cf007910cf812ec58ac0bab1949a6ee702d2\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/38/a1/f2/38a1f2293f098620c35272bf658633c8.jpg\", \"width\": 500, \"height\": 500}}}, {\"id\": \"831266043706689675\", \"url\": \"https://www.pinterest.com/pin/831266043706689675/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689675/5057013306680724917/95ab0a937ff37d7c49c8af2409d3e5571c49bb6ca2f26c0e59d4250f5be01bf0\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/3b/bc/78/3bbc783519782ed547625f4979fe5645.jpg\", \"width\": 650, \"height\": 650}}}, {\"id\": \"831266043706689671\", \"url\": \"https://www.pinterest.com/pin/831266043706689671/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689671/5057013306680724917/d092a6194a852180411cd071f1c25871174920889d756e758df1f9a146925b55\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/06/4f/22/064f224ce8d1280fa7dcb3e270f8a99d.jpg\", \"width\": 500, \"height\": 500}}}, {\"id\": \"831266043706689669\", \"url\": \"https://www.pinterest.com/pin/831266043706689669/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689669/5057013306680724917/afbeb273a7404810fa5a484a5bfa0f0ab2dcd9dff27ae3b9a297a11e6e392130\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/28/5e/b8/285eb828b4f582fd1d0a0b4574046c19.jpg\", \"width\": 1000, \"height\": 1000}}}, {\"id\": \"831266043706689665\", \"url\": \"https://www.pinterest.com/pin/831266043706689665/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689665/5057013306680724917/dfe6220e1d746afccecacc16aa497994e8701a335ca2218287b4a8b9f92f85ee\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/bc/b4/9c/bcb49c781562b46d9d9e0ec179583cd2.jpg\", \"width\": 520, \"height\": 404}}}, {\"id\": \"831266043706689663\", \"url\": \"https://www.pinterest.com/pin/831266043706689663/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689663/5057013306680724917/6bdcaa3065fda98b6d94502576b3824374085f9d1819bc2d68310932214798c7\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/e9/a6/6b/e9a66bc696d4f7551c401732f54c9c8c.jpg\", \"width\": 800, \"height\": 800}}}, {\"id\": \"831266043706689661\", \"url\": \"https://www.pinterest.com/pin/831266043706689661/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689661/5057013306680724917/def2ac1570bd7bca8f6a27861cab7ad4fced7cc8e88afc0fa952696eaa2f9503\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/4a/8c/e3/4a8ce3de78b1e21f4fda15d0e8562664.jpg\", \"width\": 1040, \"height\": 814}}}, {\"id\": \"831266043706689655\", \"url\": \"https://www.pinterest.com/pin/831266043706689655/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689655/5057013306680724917/01b9b25443ebd9f0073603ca90b28adbb130ebf09890fbb70fc458c7d5837487\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/e7/e9/a3/e7e9a3c29996c55b4d3e65dd3b33108a.jpg\", \"width\": 300, \"height\": 300}}}, {\"id\": \"831266043706689651\", \"url\": \"https://www.pinterest.com/pin/831266043706689651/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689651/5057013306680724917/59cd606b29dbc5ee8e02d901b3da3ae565d89a850cbdd9d817780129c3320fa3\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/f6/62/75/f662755b850b926c63bf109bcd9ccdf8.jpg\", \"width\": 290, \"height\": 218}}}, {\"id\": \"831266043706689650\", \"url\": \"https://www.pinterest.com/pin/831266043706689650/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689650/5057013306680724917/2de820e278be504a34f3c870a409bd1a28f2321c9d13ed0c871fc832d9591772\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/4f/c2/8e/4fc28e219451c0f5234958b0c291b6e4.jpg\", \"width\": 720, \"height\": 900}}}, {\"id\": \"831266043706689640\", \"url\": \"https://www.pinterest.com/pin/831266043706689640/\", \"link\": \"https://www.pinterest.com/r/pin/831266043706689640/5057013306680724917/c71c47da4c066b6a2d69919a92a6f6b4a50b2892cc52d5c714e34c57707962b7\", \"image\": {\"original\": {\"url\": \"https://i.pinimg.com/originals/20/ac/58/20ac58fb57c2950d6a240763723e14dd.jpg\", \"width\": 600, \"height\": 600}}}], \"page\": {\"cursor\": null, \"next\": null}}")

    @all_pins = @all_pins["data"].map{|k| k["image"]["original"]["url"]}
  end

  def select_pins
    selected_pins = params["selected_pins"]
    selected_count = current_user.pinterest_pins.count

    if selected_pins.count > $pin_selection_limit
      redirect_back(fallback_location: conversations_path, alert: "Only three pins may be selected. Please select again.")
    else
      selected_pins.each do |pin|
        current_pin = PinterestPin.where(user_id: current_user.id, image_url: pin).first
        if current_pin.nil?
          PinterestPin.create!(user_id: current_user.id, image_url: pin)
        end
      end
      admin = User.where(admin: true).first
      conversation = Conversation.between(current_user.id, admin.id).first
      pin_select_msg = "You have updated pin selections."
      create_notification = Message.create!(body: pin_select_msg, conversation_id: conversation.id, user_id: admin.id)
      redirect_back(fallback_location: pinterest_boards_path, notice: "You have updated your selected pins.")
    end
  end

  def unselect_pins
    existing_selection = PinterestPin.where(image_url: params[:image_url]).first
    existing_selection.destroy
    
    admin = User.where(admin: true).first
    conversation = Conversation.between(current_user.id, admin.id).first

    # Message displayed to the user when pin selections are removed.
    pin_unselect_msg = "You have removed pin selections."
    create_notification = Message.create!(body: pin_unselect_msg, conversation_id: conversation.id, user_id: admin.id)
    redirect_back(fallback_location: pinterest_boards_path, notice: "This pin was unselected.")
  end

  private
    def pin_params
      params.permit(:image_url)
    end
end