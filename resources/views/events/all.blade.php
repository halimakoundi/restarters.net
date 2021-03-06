@extends('layouts.app')
@section('content')
<section class="events events-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-between align-content-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{{ route('dashboard') }}}">FIXOMETER</a></li>
              <li class="breadcrumb-item"><a href="{{{ route('events') }}}">Events</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Events</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    @if (\Session::has('success'))
    <div class="alert alert-success">
      {!! \Session::get('success') !!}
    </div>
    @endif
    @if (\Session::has('warning'))
    <div class="alert alert-warning">
      {!! \Session::get('warning') !!}
    </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-lg-12">

          <header>
              <h2>All upcoming events</h2>
          </header>

          <p>There are {{ $upcoming_events_count }} upcoming events.

          <div class="table-responsive">

          <table class="table table-events table-striped" role="table">

            @include('events.tables.head-events-upcoming')

            <tbody>
              @if( !$upcoming_events->isEmpty() )
                @foreach ($upcoming_events as $event)

                  @include('events.tables.row-events-upcoming', ['invite' => true])

                @endforeach
              @else
                <tr>
                  <td colspan="13" align="center" class="p-3">There are currently no upcoming events for any of your groups<br><a href="{{{ route('groups') }}}">Find more groups</a></td>
                </tr>
              @endif
            </tbody>

          </table>

          </div>

        </section>

        <div class="d-flex justify-content-center">
          <nav aria-label="Page navigation example">
            {!! $upcoming_events->links() !!}
          </nav>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection
