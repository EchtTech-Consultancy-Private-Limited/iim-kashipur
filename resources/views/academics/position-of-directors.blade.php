@extends('front.Layouts.master')

@section('content')
    <div class="internalpagebanner">

        <img src="https://iimkashipur.ac.in/uploads/site-logo/170228510481.png" alt="Doctoral Programme" title="Doctoral Programme" loading="lazy">

        <div class="imagecaption">
            <div class="container">
                <h1 tabindex="0">
                    Position of Director
                </h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="https://dev.iim.staggings.in"><svg viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"></path>
                        </svg></a></li>
                <li><a href="javascript:void(0);">
                        Academics
                    </a>
                </li>

                <li>

                        <span tabindex="0">
                                                           Position of Director
                                                    </span>


                </li>
            </ul>
        </div>
    </div>


    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">


                <div class="col-md-12">
                    <div class="innerpagecontent master-class">
                        <h3 tabindex="0"><span tabindex="0">
                                                                                    {{$pageTitle }}
                                                                            </span>
                        </h3>
                        <div class="commontxt">
                            <div class="row">

                                <div class="col-md-12 col-lg-12">





                                    <p tabindex="0">

                                    </p><p tabindex="0">IIM Kashipur's Doctor of Philosophy (PhD) is a full time residential doctoral programme designed to address the academic and research needs of professionals. The main objectives of the programme is to provide scholars with necessary skills to identify and research complex issues in the field of management. Doctoral programe seeks candidates with outstanding academic backgrounds, intellectual curiosity and discipline needed to make scholarly contribution. The programme is committed to train individuals to excel in their area of research through publication of quality work of international standard.</p>

                                    <p tabindex="0">The objectives of the doctoral programme are:</p>

                                    <ul>
                                        <li>To encourage scholars to carry out research in the field of management, leading to publication in internationally reputed research journals and finding solutions of real world management problems.</li>
                                        <li>To equip scholars with necessary understanding and skills to identify and research on complex issues in the field of management.</li>
                                        <li>To develop expertise among prospective scholars for careers in management research and teaching and thereby to address the shortage of high quality management faculty in the country.</li>
                                    </ul><br>



                                </div>



                            </div>


                            <div class="d-flex excellence-wrap justify-content-center">
                                <div class="btn-wrap  my-4">
                                    <a class="btn btn-white" href="{{ asset('uploads/advIIMC_English_12x15_Website_final.pdf') }}" onclick="return confirm('This link will take you to an external web site.')" target="_blank">Download Advertisement</a></div>


                            <div class="btn-wrap excellence-wrap my-4">
                                <a class="btn btn-white" href="{{asset('uploads/Application form for the post of the Director updated.pdf')}}" onclick="return confirm('This link will take you to an external web site.')" target="_blank">Download Application Form</a>
                            </div>
                            </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
