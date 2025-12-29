Rails.application.routes.draw do
 
  devise_for :users, controllers: {registrations: "users/registrations", omniauth_callbacks: 'users/omniauth_callbacks'}
  # Note: Devise is a Ruby gem for modular authentication solutions in Rails applications.
  # Quick and easy setup for user authentication, including sign-up, login, logout, password recovery, and more.

  root to: "pages#index"

  # General page routes and new user onboarding steps
  get "/social_sign_up", to: "pages#social_sign_up", as: "social_sign_up"
  get "/privacy_policy", to: "pages#privacy_policy", as: "privacy_policy"
  get "/terms_of_service", to: "pages#terms_of_service", as: "terms_of_service"
  get "/thank_you", to: "onboardings#after_sign_up_thank_you", as: "thank_you"
  get "/onboarding_step", to: "onboardings#onboarding_step", as: "onboarding_step"

  # User image management routes
  post "/push_images", to: "users#push_images", as: "push_images"
  post "/push_single_image", to: "users#push_single_image", as: "push_single_image"
  get "/upload_images", to: "users#upload_images", as: "upload_images"
  delete "/delete_images/:id", to: "users#delete_images", as: "delete_images"
  
  post "/accept_user_design", to: "user_designs#accept_user_design", as: "accept_user_design"
  post "/request_revision_user_design", to: "user_designs#request_revision_user_design", as: "request_revision_user_design"
  resources :user_designs
  resources :users

  get "design_payment_confirm", to:"charges#design_payment_confirm", as: "design_payment_confirm"

  resources :charges, only: [:new, :create]
  get "user_image_uploads/pinterest_boards", to: "pinterest_sessions#pinterest_boards", as: "pinterest_boards"
  get "user_image_uploads/select_user_type", to: "user_image_uploads#select_user_type", as: "select_user_type"
  get "/get_response_code", to: "pinterest_sessions#get_response_code", as: "get_response_code"

  resources :user_image_uploads

  # Pinterest OAuth and API interaction routes
  post "/connect/pinterest", to: "pinterest_sessions#create", as: "pinterest_connect"
  get "/pinterest", to: "pinterest_sessions#get_response_code"
  post "/generate_token", to: "pinterest_sessions#generate_token"
  post "/pinterest_sessions/show_board_pins", to: "pinterest_sessions#show_board_pins", as: "show_board_pins"
  post "/select_pins", to: "pinterest_sessions#select_pins", as: "select_pins"
  get "/pinterest_sessions/index", to: "pinterest_sessions#index"
  delete "/pinterest_sessions/unselect_pins", to: "pinterest_sessions#unselect_pins", as: "unselect_pins"

  # Admin namespace for managing users, payments, designs, and notes
  namespace :admin do 
    resources :users 
    resources :user_payments
    resources :user_designs
    resources :notes
  end

  resources :conversations do 
    resources :messages
  end
end
