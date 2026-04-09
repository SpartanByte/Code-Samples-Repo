Rails.application.routes.draw do
 
  devise_for :users, controllers: {registrations: "users/registrations", omniauth_callbacks: 'users/omniauth_callbacks'}
  # Note: Devise is a Ruby gem for modular authentication solutions in Rails applications.
  # Quick and easy setup for user authentication, including sign-up, login, logout, password recovery, and more.

  root 'issues#index'

  # These resources are completely independent
  resources :issues, only: [:index, :show]
  resources :articles, only: [:index, :show]

  # Admin namespace for managing users, payments, designs, and notes
  namespace :admin do 
    resources :users
    resources :issues
    resources :articles
    # Admin namespace for managing users, issues, and articles
  end

end
