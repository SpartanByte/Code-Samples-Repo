require 'flesch_kincaid' # Only if the gem doesn't auto-load

class ArticlesController < ApplicationController
    # This is a simple CRUD controller for articles. 
    # It also includes an action to analyze the body of an article and return the Flesch-Kincaid reading level (x minutes to read).

    # Callback to execute authentication the user (with Devise https://www.rubydoc.info/gems/devise/) before it executes inside the controller actions
    before_action :authenticate_user!

    def index
        # get the params from the route, example: get '/issues/', to: 'issues#index'
        if params[:issue].present?
            @issue = Issue.find(params[:issue])
        end
        @articles = Article.where(issue_id: params[:issue])
    end

    def show
        @article = Article.find(params[:id])
    end

    def new
        @issue_id = params[:issue]
    end

    def create
        result = FleschKincaid.read(Article.generate_flesch_kincaid_text(params[:body].to_json))
        article = Article.create!(
            issue_id: params[:issue_id],
            headline: params[:headline],
            body: params[:body].to_json,
            reading_level: result.grade
        )
        render json: {message: "success", issue_id: params[:issue_id]}
    end

    def edit
        @article = Article.find(params[:id])
    end

    def update
        result = FleschKincaid.read(Article.generate_flesch_kincaid_text(params[:body].to_json))
        article = Article.find(params[:article_id])
        article.update!(
            issue_id: params[:issue_id],
            headline: params[:headline],
            body: params[:body].to_json,
            reading_level: result.grade
        )
        article.save
        render json: {message: "success"}
    end

    def destroy
        article = Article.find(params[:id])
        article.destroy
        render json: {message: "success"}
    end

    def analyze_body
        article = Article.find(params[:id])
        result = FleschKincaid.read(Article.generate_flesch_kincaid_text(params[:body].to_json))
        render json: {message: "success", reading_level: result.grade }
    end
end