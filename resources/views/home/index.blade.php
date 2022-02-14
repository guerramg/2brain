@extends('template.index')
<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">

@section('content')

<body class="g-sidenav-show  bg-gray-200">
    <section class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- End Navbar -->
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Próximos Aniversários</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aniversariante</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                        <th></th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($birthday as $details)

                        <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div class="my-auto">
                                  <h6 class="text-sm font-weight-bold mb-0">{{  $details-> name  }}</h6>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-sm font-weight-bold mb-0">{{ $details -> day }}/{{ $details -> month."/".date("Y") }}</p>
                            </td>
        
                            <td class="align-middle">
                              <a href="{{  route('birthdays.edit', $details->id) }}"><button class="btn btn-link text-secondary mb-0">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </a>
                            </td>
                          </tr>    

                          @empty

                          <tr>
                              <td colspan="3"> Sem registros</td>
                          </tr>
                              
                          @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Próximos Lembretes</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lembrete</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($sticky as $details)
                        <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div class="my-auto">
                                  <h6 class="text-sm font-weight-bold mb-0">{{ date("d/m/Y", strtotime($details -> date)) }}</h6>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-sm font-weight-bold mb-0">{{ $details -> sticky }}</p>
                            </td>
        
                            <td class="align-middle">
                              <a href="{{ route('stickies.edit', $details->id ) }}">
                                  <button class="btn btn-link text-secondary mb-0">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </a>
                            </td>
                          </tr>    
                        @empty
                            <tr>
                                <td colspan="3"> Sem registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
  
      </div>
    </section>
  

@endsection