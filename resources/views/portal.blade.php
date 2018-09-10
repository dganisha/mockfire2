@extends('admin_template')

@section('content')
  <!--==========================
    Get Started Section
  ============================-->
  <section id="get-started" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>{{ config('app.name', 'Laravel') }}</h2>
        <p class="separator">Create your own mock data !</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{ asset("/mockfire/img/svg/cloud.svg") }}" alt="img" class="img-fluid">
            <h4>mock data generator</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{ asset("/mockfire/img/svg/planet.svg") }}" alt="img" class="img-fluid">
            <h4>user friendly interface</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{ asset("/mockfire/img/svg/asteroid.svg") }}" alt="img" class="img-fluid">
            <h4>build the app everyone love</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

          </div>
        </div>

      </div>
    </div>

  </section>

  <!--==========================
    Team Section
  ============================-->
  <section id="team" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Contributor</h2>
        <p class="separator">Para kontributor MockFire.</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://www.atomix.com.au/media/2015/06/atomix_user31.png" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <h4>Dhiemas Ganisha A P P</h4>
            </div>
          </div>
        </div>

       <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://www.atomix.com.au/media/2015/06/atomix_user31.png" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <h4>Nunu Reza Mushinin</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://www.atomix.com.au/media/2015/06/atomix_user31.png" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <h4>-</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="http://meridian.id/d2b0916c7b5a4c611854d6e95e0e3f5b.svg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>All Stafs & Members</span>
              <h4>MERIDIAN.ID</h4>
            </div>
          </div>
        </div>

      </div>
    </div><br>
    <p class="text-center"><a href="#">See all contributor</a></p>
  </section>

@endsection