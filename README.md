# Movie Searcher
This is the assignment application for Dept that uses Laravel as the backend.

## Choices

- I use Laravel as the backend mostly due to the simplicity of the framework, it also has a great API client that I use for sending requests to the [The Movies DB API](https://www.themoviedb.org)
- I put all the API request logic inside a Service folder. Therefore I can use the requests on multiple pages. Wich saves me some time.
- The data is filtered to only show the stuff I need using dedicated functions. 
- Livewire is used to make the application interactive, I could've done everything using post requests, but hey it's 2022 right. 
- For a basic fancy ✨ frontend, I use Tailwind, it's easy and makes the application just a bit prettier.

There are a total of 2 components, one for the application layout (so I dont have to include basic imports) and one for the movie card. So I can reduce file size on the home page. 

## Installation

- Clone the repository: `git clone git@github.com:NordyVlasman/movie-search.git`
- Run `composer install` to get the vendor packages and `npm install` for the frontend packages
- Copy the `.env.example` file to `.env` and fill the `TMDB_API_KEY` with your own API key
- Run `php artisan key:generate` to generate your encryption key
- Build the frontend using `npm run dev`
- Start the application using `php artisan serve` so you can find the application at [http://localhost:8000](http://localhost:8000)

> Note: You can request a API Key over [here](https://developers.themoviedb.org/3/getting-started/introduction) or send me an email the key has to be Version 4, otherwhise the application **wont** work 
<br/>

> Note 2: This application is built using php 8.0 and won't work on 7.3
