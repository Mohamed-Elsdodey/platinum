@extends('frontend.layouts.layout')

@section('title')
{{__('frontend.Musaned')}}
@endsection

@section('styles')
<style>
</style>
@endsection


@section('content')


<content>
  <section class="musaned">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <img class="musanedLogo wow fadeInUp" src="{{asset('frontend')}}/img/musaned.svg" alt="">
          <h6 class="hint wow fadeInUp">{{trans('frontend.The Musaned platform is one of the initiatives of the Ministry of Human Resources and Social Development, and it is a comprehensive electronic platform to experience the recruitment of domestic workers in an integrated manner.')}} </h6>
        </div>
      </div>
    </div>
  </section>
  <section class="videoSection">
    <div class="container">
      <div class="row">
        <div class="col-md-6 p-2 pt-5 ">
          <div class="SectionTitle  ">
            <h1 class="title wow fadeInUp"> {{trans('frontend.support platform')}} </h1>
            <h6 class="hint wow fadeInUp">
              {{trans('frontend.Musaned platform The Musaned program works through introductory windows and electronic services such as issuing electronic recruitment visas and other forms to provide recruitment services to citizens and residents wishing to bring in domestic workers by providing an ideal work environment to improve the recruitment sector in the Kingdom and abroad and developing a service for the recruitment of domestic workers for Saudi families to resolve complaints and recruitment disputes In Saudi Arabia, to protect the rights of all parties concerned with recruitment, and to inform Saudi citizens of their rights and duties towards them.')}}
            </h6>
          </div>
          <div class="feature">
            <div class="content wow fadeInUp">
              <i class="fa-solid fa-badge-check me-3"></i>
              <div class="info">
                <h3>{{trans('frontend.Electronic documentation')}} </h3>
                <p>
                  {{trans('frontend.Electronic documentation with ease You can contract with more than 1,400 recruitment offices all over the Kingdom')}}
                </p>
              </div>
            </div>
            <div class="content wow fadeInUp">
              <i class="fa-solid fa-buildings me-3"></i>
              <div class="info">
                <h3>{{trans('frontend.Office Management')}} </h3>
                <p>
                  {{trans('frontend.With ease, you can contract with more than 1,400 recruitment offices across the Kingdom')}}
                </p>
              </div>
            </div>
            <div class="content wow fadeInUp">
              <i class="fa-solid fa-users me-3"></i>
              <div class="info">
                <h3> {{trans('frontend.Rental Services')}} </h3>
                <p>
                  {{trans('frontend.With ease, you can contract with more than 1,400 recruitment offices across the Kingdom')}}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 p-2 p-md-0 ">
          <div class="video">
            <a class="videoPopup" href="https://www.youtube.com/embed/wlLjqeDDi2Y" data-fancybox>
              <i class="fas fa-play"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="musanedTrip">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="SectionTitle">
            <h1 class="title wow fadeInUp"> {{trans('frontend.Musaned trip')}} </h1>
            <h6 class="hint wow fadeInUp">
              {{trans('frontend.Musaned, the domestic worker program, allows employers to submit their recruitment preferences for age, religion, and previous work experience to the recruitment agency of their choice. In response, recruitment agencies and agencies provide clients with up to five domestic worker resumes to choose from. Once the decision is made, the employer can proceed with paying the usage fee and sign an electronic contract with the recruitment agency. This electronic contract differs from the contract between the employer and the domestic worker, which is often signed in the country of origin between the Saudi Agency (on behalf of the employer) and the domestic worker prior to its arrival in the Kingdom.')}}
            </h6>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class=" col">
          <div class="trip wow fadeInUp">
            <img src="{{asset('frontend')}}/img/data.svg" alt="">
            <h4> {{trans('frontend.Recruitment according to specifications')}} </h4>
          </div>
        </div>
        <div class=" col">
          <div class="trip wow fadeInUp">
            <img src="{{asset('frontend')}}/img/job.svg" alt="">
            <h4> {{trans('frontend.Recruitment by profession')}} </h4>
          </div>
        </div>
        <div class=" col">
          <div class="trip wow fadeInUp">
            <img src="{{asset('frontend')}}/img/national.svg" alt="">
            <h4> {{trans('frontend.Recruitment by nationality')}} </h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="musanedRecruitment">
    <div class="container">
      <div class="SectionTitle">
        <h1 class="title wow fadeInUp"> {{trans('frontend.steps')}} </h1>
        <h6 class="hint wow fadeInUp"> {{trans('frontend.Recruitment steps from Musaned')}} </h6>
      </div>
      <div class="row flex-wrap">
        <div class="col p-2">
          <div class="specifications  wow fadeInUp">
            <i class="fa-solid fa-hand-pointer"></i>
            <h5>{{trans('frontend.Determine the type of recruitment')}}</h5>
            <p>{{trans('frontend.Choose the type of recruitment according to preference, either to bring in a worker with specific specifications or to bring in a pre-specified worker by name')}}
            </p>
          </div>
        </div>
        <div class="col p-2">
          <div class="specifications  wow fadeInUp">
            <i class="fa-solid fa-buildings"></i>
            <h5>{{trans('frontend.Choose a service provider')}} </h5>
            <p>{{trans('frontend.Choose from +1,400 service providers from all over the Kingdom, you can choose based on the evaluation of the office, the percentage of acceptance of recruitment applications, the city of arrival')}}
            </p>
          </div>
        </div>
        <div class="col p-2">
          <div class="specifications  wow fadeInUp">
            <i class="fa-solid fa-file-pen"></i>
            <h5>{{trans('frontend.Receipt of recruitment offers')}} </h5>
            <p>{{trans('frontend.Receipt of offers of recruitment requests from service providers, including the salary due to the worker with CVs to be arranged in order of preference')}}
            </p>
          </div>
        </div>
        <div class="col p-2">
          <div class="specifications  wow fadeInUp">
            <i class="fa-solid fa-credit-card"></i>
            <h5>{{trans('frontend.Pay recruitment fees')}} </h5>
            <p>
              {{trans('frontend.Pay securely through Musaned After creating the contract, you can choose among several payment methods: Visa, MasterCard, or through mada bank card')}}
            </p>
          </div>
        </div>
        <div class="col p-2">
          <div class="specifications  wow fadeInUp">
            <i class="fa-solid fa-location-crosshairs"></i>
            <h5>{{trans('frontend.Recruitment application tracking')}} </h5>
            <p>{{trans('frontend.You can follow the journey of the recruitment application with ease and ease through your account on the Musaned platform, starting from the creation of the application until the arrival of the worker to the Kingdom')}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="musanedFees">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 p-2">
          <div class="SectionTitle">
            <h1 class="title wow fadeInUp"> {{trans('frontend.fees')}} </h1>
            <h6 class="hint wow fadeInUp"> {{trans('frontend.Recruitment with Musaned')}} </h6>
          </div>
          <p class="wow fadeInUp">
            {{trans('frontend.Pay your domestic labor visa fees through government services in the bank or through online payment channels where Musaned provides several secure payment methods, the user can choose the appropriate one from Mada, Visa or MasterCard')}}
          </p>
          <div class="images">
            <img src="{{asset('frontend')}}/img/mc.webp" class="wow fadeInUp">
            <img src="{{asset('frontend')}}/img/visa.webp" class="wow fadeInUp">
            <img src="{{asset('frontend')}}/img/mada.webp" class="wow fadeInUp">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="musanedApp">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-md-6 p-2">
          <div class="info">
            <img src="{{asset('frontend')}}/img/musaned.svg" alt="" class=" wow fadeInUp">
            <h4>{{trans('frontend.A mobile support application for both Android and iPhone systems')}} </h4>
            <p>{{trans('frontend.Musaned mobile application is an application supported by the Ministry of Labor in the Kingdom of Saudi Arabia to serve domestic workers through which you can request an employment visa or easily track the status of previously requested visas, and you can also use the worker documentation mechanism.')}}
            </p>
            <div class="links">
              <a href="#!" target="_blank" class=" wow fadeInUp">
                <img src="{{asset('frontend')}}/img/google-play-android.webp" alt="">
              </a>
              <a href="#!" target="_blank" class=" wow fadeInUp">
                <img src="{{asset('frontend')}}/img/apple-iphone-ios.webp" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 p-0 d-md-block">
          <div class="appImg">
            <img src="{{asset('frontend')}}/img/app.webp" alt="" class=" wow fadeInUp">
          </div>
        </div>
      </div>
    </div>
  </section>




  @endsection