@extends('layouts.master')

@section('title', 'Главная')

@section('content')

    <!-- карусель -->
    <div class="container mb-4">
      
      <div class="align-items-center tagline-container d-flex justify-content-center"> 
        <img class = "center-block mt-4" src="images/logot.png" alt="" >
        <h1 class="text-center">Гитарное бренчанье для прикольоного звучанья!</h1>
      </div>
      
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <h2 class="text-center">Новинки компании</h1>
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active height-600" data-bs-interval="10000">
                <div class="d-flex justify-content-center">
                <img class="carousel-image " src="images/product14.jpeg" alt="...">
                </div>
                <div style="width: 300px;">
                  <div class="carousel-caption" >

                  <h5>Акустическая гитара</h5>
                  <p>COLOMBO LF - 3800 CT / TBK</p>
                </div>
                </div>
                
              </div>
              <div class="carousel-item height-600 " data-bs-interval="2000">
                <div class="d-flex justify-content-center">
                    <img class="carousel-image " src="images/product16.jpeg" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block ">
                  <h5>Синтезатор</h5>
                  <p>CASIO SA-77</p>
                </div>
              </div>
              <div class="carousel-item height-600">
                <div class="d-flex justify-content-center ts">
                    <img class="carousel-image " src="images/product10.jpeg" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block ">
                  <h5>Электрогитара</h5>
                  <p>FABIO ST100 N</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

@endsection