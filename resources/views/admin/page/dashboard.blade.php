@extends('admin.layouts.index')

@section('chart')
<script src="{{ $orderschart['chart']->cdn() }}"></script>
{{ $orderschart['chart']->script() }}
@endsection
@section('content')

{{-- Card highlight --}}
<div class="row">
  {{-- Order pending --}}
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-dark">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-5 fw-semibold" id="order_pending">{{ $order_pending }} <span class="fs-6 fw-normal" hidden>
            </span></div>
          <div id="pendingall">Pending</div>
          <div class="fs-5 fw-semibold" id="pendingOrdersByMonth" style="display:none;">
            {{ $order_pending_month }}
            <span class="fs-6 fw-normal"></span>
          </div>
          <div id="pendingmonth" hidden>Pending (Month)</div>
        </div>
        <div class="dropdown">
          <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a id="showPendingByMonth" class="dropdown-item" href="#" onclick="showPendingByMonth()">Bulan</a>
            <a id="showPendingByOverall" class="dropdown-item" href="#" onclick="showPendingByOverall()">Keseluruhan</a>
          </div>
        </div>
      </div>
      <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <div class="pending text-end me-2"  >
          <i class="fas fa-hourglass-end opacity-50" style="font-size:3rem;"></i>
        </div>
        {{-- <canvas class="chart" id="card-chart1" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas> --}}
        {{-- <div class="chartjs-tooltip" style="opacity: 0; left: 283px; top: 144.339px;">
          <table style="margin: 0px;">
            <thead class="chartjs-tooltip-header">
              <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                <th style="border-width: 0px;">July</th>
              </tr>
            </thead>
            <tbody class="chartjs-tooltip-body">
              <tr class="chartjs-tooltip-body-item">
                <td style="border-width: 0px;"><span style="background: rgb(50, 31, 219); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 40</td>
              </tr>
            </tbody>
          </table>
        </div> --}}
      </div>
    </div>
  </div>

  {{-- Order accepted --}}
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-info">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-5 fw-semibold" id="orderAcc">{{ $order_acc }} <span class="fs-6 fw-normal" hidden>
              </svg></span></div>
          <div id="accall">Disetujui</div>
          <div class="fs-5 fw-semibold" id="acceptedOrdersByMonth" style="display:none;">{{$total_accmonth}}<span class="fs-6 fw-normal">
              </svg></span></div>
          <div id="accmonth" hidden>Accepted (Month)</div>
        </div>

        <div class="dropdown">
          <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a id="showByMonth" class="dropdown-item" href="#" onclick="showByMonth()">Bulan</a>
            <a id="showByOverall" class="dropdown-item" href="#" onclick="showByOverall()">Keseluruhan</a>
          </div>
        </div>
      </div>
      <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <div class="pending text-end " style="margin-top: -.5rem">
          <i class="fas fa-check-circle opacity-50" style="font-size:4rem;"></i>
        </div>
        {{-- <canvas class="chart" id="card-chart2" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas>
        <div class="chartjs-tooltip" style="opacity: 0; left: 283px; top: 130.25px;">
          <table style="margin: 0px;">
            <thead class="chartjs-tooltip-header">
              <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                <th style="border-width: 0px;">July</th>
              </tr>
            </thead>
            <tbody class="chartjs-tooltip-body">
              <tr class="chartjs-tooltip-body-item">
                <td style="border-width: 0px;"><span style="background: rgb(51, 153, 255); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 11</td>
              </tr>
            </tbody>
          </table>
        </div> --}}
      </div>
    </div>
  </div>

  {{-- Order rejected --}}
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-danger">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-5 fw-semibold" id="order_rej">{{ $order_rej }} <span class="fs-6 fw-normal" hidden>
            </span></div>
          <div id="rejectall">Ditolak</div>
          <div class="fs-5 fw-semibold" id="rejectedOrdersByMonth" style="display:none;">
            {{ $order_rejected_month }}
            <span class="fs-6 fw-normal"></span>
          </div>
          <div id="rejectmonth" hidden>Reject (Month)</div>
        </div>
        <div class="dropdown">
          <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a id="showRejectedByMonth" class="dropdown-item" href="#" onclick="showRejectedByMonth()">Bulan</a>
            <a id="showRejectedByOverall" class="dropdown-item" href="#" onclick="showRejectedByOverall()">Keseluruhan</a>
          </div>
        </div>
      </div>
      <div class="c-chart-wrapper mt-3" style="height:70px;">
        <div class="pending text-end me-3" style="margin-top: -.5rem">
          <i class="fas fa-times-circle opacity-50" style="font-size:4rem;"></i>
        </div>
        {{-- <canvas class="chart" id="card-chart3" height="70" width="304" style="display: block; box-sizing: border-box; height: 70px; width: 304px;"></canvas> --}}
      </div>
    </div>
  </div>

  {{-- Income --}}
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-success">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-5 fw-semibold" id="revenue">Rp {{ number_format($pendapatan, 0, ',', '.') }} <span class="fs-6 fw-normal"></span></div>
          <div id="pendapatansemua">Pendapatan</div>
          <div class="fs-5 fw-semibold" id="revenueMonth" style="display:none;">Rp {{ number_format($pendapatan_month, 0, ',', '.') }} <span class="fs-6 fw-normal"></span></div>
          <div id="revenueText" hidden>Income (Month)</div>
        </div>
        <div class="dropdown">
          <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a id="showRevenueByMonth" class="dropdown-item" href="#" onclick="showRevenueByMonth()">Bulan</a>
            <a id="showRevenueByOverall" class="dropdown-item" href="#" onclick="showRevenueByOverall()">Keseluruhan</a>
          </div>
        </div>
      </div>
      <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <div class="pending text-end " style="margin-top: -.5rem">
          <i class="fas fa-money-bill-wave opacity-50" style="font-size:4rem;"></i>
        </div>
        {{-- <canvas class="chart" id="card-chart4" height="70" width="272" style="display: block; box-sizing: border-box; height: 70px; width: 272px;"></canvas> --}}
      </div>
    </div>
  </div>
</div>


{{-- Chart --}}
<!-- <div class="card-body">
  <div class="d-flex justify-content-between">
    <div>
      <h4 class="card-title mb-0">Trafficoo</h4>
      <div class="small text-medium-emphasis">January - July 2022</div>
    </div>
  </div>
  <div class="c-chart-wrapper" style="height:400px;margin-top:40px;">
    <canvas class="chart" id="main-chart" height="300" width="1262" style="display: block; box-sizing: border-box; height: 300px; width: 1262px;"></canvas>
  </div>
</div> -->

<hr>
<div class="p-4 m-4 bg-white rounded shadow chart-container">
  {!! $orderschart['chart']->container() !!}
</div>


<script>
    function showByOverall() {
      $('#orderAcc').show();
      $('#accall').show();
      $('#accmonth').attr('hidden', 'hidden');
      $('#acceptedOrdersByMonth').hide();

    }

    function showByMonth() {
      $('#orderAcc').hide();
      $('#acceptedOrdersAll').hide();
      $('#acceptedOrdersByMonth').show();
      $('#accall').hide();
      $('#accmonth').removeAttr('hidden');

    }

    function showPendingByMonth() {
      $('#pendingall').hide();
      $('#pendingmonth').removeAttr('hidden');
      $('#order_pending').hide();
      $('#pendingOrdersByMonth').show();
    }

    function showPendingByOverall() {
      $('#pendingall').show();
      $('#pendingmonth').attr('hidden', 'hidden');
      $('#order_pending').show();
      $('#pendingOrdersByMonth').hide();
    }

    function showRejectedByMonth() {
      $('#rejectall').hide();
      $('#rejectmonth').removeAttr('hidden');
      $('#order_rej').hide();
      $('#rejectedOrdersByMonth').show();
    }

    function showRejectedByOverall() {

      $('#rejectall').show();
      $('#rejectmonth').attr('hidden', 'hidden');
      $('#order_rej').show();
      $('#rejectedOrdersByMonth').hide();
    }

    function showRevenueByMonth() {
      $('#pendapatansemua').hide();
      $('#revenue').hide();
      $('#revenueMonth').show();
      $('#revenueText').removeAttr('hidden'); // Menampilkan teks "Revenue (This Month)"
    }

    function showRevenueByOverall() {
      $('#pendapatansemua').show();
      $('#revenue').show();
      $('#revenueMonth').hide();
      $('#revenueText').attr('hidden', 'hidden'); // Menyembunyikan teks "Revenue (This Month)"
    }
  </script>




@endsection