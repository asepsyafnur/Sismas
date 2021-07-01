@extends('admin/templates/v_default')
@section('title', 'Ippmp | dashboard')
@section('content')
<section class="content mt-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $suratM }}</h3>

            <p>Surat Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-envelope-open-text"></i>
          </div>
          <div class="small-box-footer" style="height:30px"></div>
        </div>
      </div>
      <div class="col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $suratK }}</h3>

            <p>Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="far fa-envelope"></i>
          </div>
          <div class="small-box-footer" style="height:30px"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card bg-gradient-success">
          <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

            <h3 class="card-title">
              <i class="far fa-calendar-alt"></i>
              Calendar
            </h3>
            <!-- tools card -->
            <div class="card-tools">
              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%">
              <div class="bootstrap-datetimepicker-widget usetwentyfour">
                <ul class="list-unstyled">
                  <li class="show">
                    <div class="datepicker">
                      <div class="datepicker-days">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th>
                              <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">June 2021</th>
                              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                            </tr>
                            <tr>
                              <th class="dow">Su</th>
                              <th class="dow">Mo</th>
                              <th class="dow">Tu</th>
                              <th class="dow">We</th>
                              <th class="dow">Th</th>
                              <th class="dow">Fr</th>
                              <th class="dow">Sa</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td data-action="selectDay" data-day="05/30/2021" class="day old weekend">30</td>
                              <td data-action="selectDay" data-day="05/31/2021" class="day old">31</td>
                              <td data-action="selectDay" data-day="06/01/2021" class="day">1</td>
                              <td data-action="selectDay" data-day="06/02/2021" class="day">2</td>
                              <td data-action="selectDay" data-day="06/03/2021" class="day">3</td>
                              <td data-action="selectDay" data-day="06/04/2021" class="day">4</td>
                              <td data-action="selectDay" data-day="06/05/2021" class="day weekend">5</td>
                            </tr>
                            <tr>
                              <td data-action="selectDay" data-day="06/06/2021" class="day weekend">6</td>
                              <td data-action="selectDay" data-day="06/07/2021" class="day">7</td>
                              <td data-action="selectDay" data-day="06/08/2021" class="day">8</td>
                              <td data-action="selectDay" data-day="06/09/2021" class="day">9</td>
                              <td data-action="selectDay" data-day="06/10/2021" class="day">10</td>
                              <td data-action="selectDay" data-day="06/11/2021" class="day">11</td>
                              <td data-action="selectDay" data-day="06/12/2021" class="day weekend">12</td>
                            </tr>
                            <tr>
                              <td data-action="selectDay" data-day="06/13/2021" class="day weekend">13</td>
                              <td data-action="selectDay" data-day="06/14/2021" class="day">14</td>
                              <td data-action="selectDay" data-day="06/15/2021" class="day">15</td>
                              <td data-action="selectDay" data-day="06/16/2021" class="day">16</td>
                              <td data-action="selectDay" data-day="06/17/2021" class="day">17</td>
                              <td data-action="selectDay" data-day="06/18/2021" class="day">18</td>
                              <td data-action="selectDay" data-day="06/19/2021" class="day weekend">19</td>
                            </tr>
                            <tr>
                              <td data-action="selectDay" data-day="06/20/2021" class="day weekend">20</td>
                              <td data-action="selectDay" data-day="06/21/2021" class="day">21</td>
                              <td data-action="selectDay" data-day="06/22/2021" class="day">22</td>
                              <td data-action="selectDay" data-day="06/23/2021" class="day active today">23</td>
                              <td data-action="selectDay" data-day="06/24/2021" class="day">24</td>
                              <td data-action="selectDay" data-day="06/25/2021" class="day">25</td>
                              <td data-action="selectDay" data-day="06/26/2021" class="day weekend">26</td>
                            </tr>
                            <tr>
                              <td data-action="selectDay" data-day="06/27/2021" class="day weekend">27</td>
                              <td data-action="selectDay" data-day="06/28/2021" class="day">28</td>
                              <td data-action="selectDay" data-day="06/29/2021" class="day">29</td>
                              <td data-action="selectDay" data-day="06/30/2021" class="day">30</td>
                              <td data-action="selectDay" data-day="07/01/2021" class="day new">1</td>
                              <td data-action="selectDay" data-day="07/02/2021" class="day new">2</td>
                              <td data-action="selectDay" data-day="07/03/2021" class="day new weekend">3</td>
                            </tr>
                            <tr>
                              <td data-action="selectDay" data-day="07/04/2021" class="day new weekend">4</td>
                              <td data-action="selectDay" data-day="07/05/2021" class="day new">5</td>
                              <td data-action="selectDay" data-day="07/06/2021" class="day new">6</td>
                              <td data-action="selectDay" data-day="07/07/2021" class="day new">7</td>
                              <td data-action="selectDay" data-day="07/08/2021" class="day new">8</td>
                              <td data-action="selectDay" data-day="07/09/2021" class="day new">9</td>
                              <td data-action="selectDay" data-day="07/10/2021" class="day new weekend">10</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="datepicker-months" style="display: none;">
                        <table class="table-condensed">
                          <thead>
                            <tr>
                              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                              <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th>
                              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month active">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="datepicker-years" style="display: none;">
                        <table class="table-condensed">
                          <thead>
                            <tr>
                              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                              <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="datepicker-decades" style="display: none;">
                        <table class="table-condensed">
                          <thead>
                            <tr>
                              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                              <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </li>
                  <li class="picker-switch accordion-toggle"></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
@endSection