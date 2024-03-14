<!--travel-box start-->
<section class="travel-box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="single-travel-boxes">
          <div id="desc-tabs" class="desc-tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
                  <i class="fa fa-tree"></i>
                  Tours
                </a>
              </li>

              <li role="presentation">
                <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">
                  <i class="fa fa-building"></i>
                  Hotels
                </a>
              </li>

              <li role="presentation">
                <a href="#cars" aria-controls="cars" role="tab" data-toggle="tab">
                  <i class="fa fa-cars"></i>
                  Cars
                </a>
              </li>
            </ul>

            <!-- Tab panel -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active fade in" id="tours">
                <form method="post" action="trick.php?mych=5">
                  <div class="tab-para">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-tab-select-box">
                          <h2>Destination</h2>

                          <div class="travel-select-icon">
                            <select class="form-control" name="destination">
                              <option value="default">
                                enter your destination location
                              </option>
                              <!-- /.option-->
                              <option value="Andaman and Nicobar Islands">Andaman Nicobar and Islands</option>
                              <option value="Andhra Pradesh">Andhra Pradesh</option>
                              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                              <option value="Assam">Assam</option>
                              <option value="Chattisgarh">Chattisgarh</option>
                              <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                              <option value="Daman and Diu">Daman and Diu</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Goa">Goa</option>
                              <option value="Gujarat">Gujarat</option>
                              <option value="Himachal Pradesh">Himachal Pradesh</option>
                              <option value="jammu Kashmir">Jammu Kashmir</option>
                              <option value="Karnataka">Karnataka</option>
                              <option value="Kerala">Kerala</option>
                              <option value="Madhya Pradesh">Madhya Pradesh</option>
                              <option value="Maharashtra">Maharashtra</option>
                              <option value="Meghalaya">Meghalaya</option>
                              <option value="Nagaland">Nagaland</option>
                              <option value="Punjab">Punjab</option>
                              <option value="Rajasthan">Rajasthan</option>
                              <option value="Sikkim">Sikkim</option>
                              <option value="Telangana">Telangana</option>
                              <option value="Tamil Nadu">Tamil Nadu</option>
                              <option value="Uttrakhand">Uttrakhand</option>
                              <option value="Uttar Pradesh">Uttar Pradesh</option>
                              <option value="West Bengal">West Bengal</option>
                            </select><!-- /.select-->
                          </div>
                          <!-- /.travel-select-icon -->
                        </div>
                        <!--/.single-tab-select-box-->
                      </div>
                      <!--/.col-->

                      <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="single-tab-select-box">
                          <h2>check in</h2>
                          <div class="travel-check-icon">

                            <input type="text" name="check_in" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 " />

                          </div>
                          <!-- /.travel-check-icon -->
                        </div>
                        <!--/.single-tab-select-box-->
                      </div>
                      <!--/.col-->

                      <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="single-tab-select-box">
                          <h2>check out</h2>
                          <div class="travel-check-icon">

                            <input type="text" name="check_out" class="form-control" data-toggle="datepicker" placeholder="22 -01 - 2017 " />

                          </div>
                          <!-- /.travel-check-icon -->
                        </div>
                        <!--/.single-tab-select-box-->
                      </div>
                      <!--/.col-->

                      <div class="col-lg-2 col-md-1 col-sm-4">
                        <div class="single-tab-select-box">
                          <h2>duration</h2>
                          <div class="travel-select-icon">
                            <select class="form-control" name="duration">
                              <option value="default">1</option>
                              <!-- /.option-->

                              <option value="1 D">1 Day</option>
                              <!-- /.option-->
                              <option value="2 D">2 Days</option>

                              <option value="3 D">3 Days</option>
                              <!-- /.option-->
                              <option value="4 D">4 Days</option>
                              <!-- /.option-->
                              <option value="5 D">5 Days</option>
                              <option value="6 D">6 Days</option>
                              <option value="1 W">1 Week</option>
                              <option value="2 W">2 Week</option>
                            </select><!-- /.select-->
                          </div>
                          <!-- /.travel-select-icon -->
                        </div>
                        <!--/.single-tab-select-box-->
                      </div>
                      <!--/.col-->

                      <div class="col-lg-2 col-md-1 col-sm-4">
                        <div class="single-tab-select-box">
                          <h2>persons</h2>
                          <div class="travel-select-icon">
                            <select class="form-control" name="persons">
                              <option value="1">1</option>
                              <!-- /.option-->

                              <option value="2">2</option>
                              <!-- /.option-->
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <!-- /.option-->
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select><!-- /.select-->
                          </div>
                          <!-- /.travel-select-icon -->
                        </div>
                        <!--/.single-tab-select-box-->
                      </div>
                      <!--/.col-->
                    </div>
                    <!--/.row-->

                    <div class="row">
                      <div class="clo-sm-7">
                        <div class="about-btn travel-mrt-0 pull-right">
                          <?php
                          if (isset($_SESSION['user_id'])) { ?>
                            <button class="about-view travel-btn">search</button>
                          <?php
                          } else { ?>
                            <button type="button" class="about-view travel-btn" onclick="userlogin();">search</button>
                            <!--/.about-btn-->
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div role="tabpanel" class="tab-pane fade in" id="hotels">
                <div class="tab-para">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="single-tab-select-box">
                        <h2>Select your Destination Region:</h2>
                        <div class="travel-select-icon">
                          <select class="form-control" id="destination" onchange="populatePlaces()">
                            <option value="default">Enter your destination region</option>
                            <option value="Eastern">Eastern</option>
                            <option value="Western">Western</option>
                            <option value="Northern">Northern</option>
                            <option value="Southern">Southern</option>
                            <option value="Central">Central</option>
                          </select>
                        </div>
                        <div class="travel-select-icon" id="north">
                          <select class="form-control" id="places">
                            <option value="default">Enter your destination place:</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>check in</h2>
                        <div class="travel-check-icon">
                          <form action="#">
                            <input type="text" name="check_in" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 " />
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>check out</h2>
                        <div class="travel-check-icon">
                          <form action="#">
                            <input type="text" name="check_out" class="form-control" data-toggle="datepicker" placeholder="22 -01 - 2017 " />
                          </form>
                        </div>
                        <!-- /.travel-check-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-1 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>duration</h2>
                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">5</option>
                            <!-- /.option-->

                            <option value="10">10</option>
                            <!-- /.option-->

                            <option value="15">15</option>
                            <!-- /.option-->
                            <option value="20">20</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-1 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>members</h2>
                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">1</option>
                            <!-- /.option-->

                            <option value="2">2</option>
                            <!-- /.option-->

                            <option value="4">4</option>
                            <!-- /.option-->
                            <option value="8">8</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->
                  </div>
                  <!--/.row-->

                  <div class="row">
                    <div class="col-sm-5"></div>
                    <!--/.col-->
                    <div class="clo-sm-7">
                      <div class="about-btn travel-mrt-0 pull-right">
                        <button class="about-view travel-btn">search</button><!--/.travel-btn-->
                      </div>
                      <!--/.about-btn-->
                    </div>
                    <!--/.col-->
                  </div>
                  <!--/.row-->
                </div>
                <!--/.tab-para-->
              </div>
              <!--/.tabpannel-->

              <div role="tabpanel" class="tab-pane fade in" id="cars">
                <div class="tab-para">
                  <div class="trip-circle">
                    <div class="single-trip-circle">
                      <input type="radio" id="radio01" name="radio" />
                      <label for="radio01">
                        <span class="round-boarder">
                          <span class="round-boarder1"></span> </span>round trip
                      </label>
                    </div>
                    <!--/.single-trip-circle-->
                    <div class="single-trip-circle">
                      <input type="radio" id="radio02" name="radio" />
                      <label for="radio02">
                        <span class="round-boarder">
                          <span class="round-boarder1"></span> </span>on way
                      </label>
                    </div>
                    <!--/.single-trip-circle-->
                  </div>
                  <!--/.trip-circle-->
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="single-tab-select-box">
                        <h2>from</h2>

                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">
                              enter your location
                            </option>
                            <!-- /.option-->

                            <option value="turkey">turkey</option>
                            <!-- /.option-->

                            <option value="russia">russia</option>
                            <!-- /.option-->
                            <option value="egept">egypt</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>departure</h2>
                        <div class="travel-check-icon">
                          <form action="#">
                            <input type="text" name="departure" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 " />
                          </form>
                        </div>
                        <!-- /.travel-check-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>return</h2>
                        <div class="travel-check-icon">
                          <form action="#">
                            <input type="text" name="return" class="form-control" data-toggle="datepicker" placeholder="22 -01 - 2017 " />
                          </form>
                        </div>
                        <!-- /.travel-check-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-1 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>adults</h2>
                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">5</option>
                            <!-- /.option-->

                            <option value="10">10</option>
                            <!-- /.option-->

                            <option value="15">15</option>
                            <!-- /.option-->
                            <option value="20">20</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-2 col-md-1 col-sm-4">
                      <div class="single-tab-select-box">
                        <h2>childs</h2>
                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">1</option>
                            <!-- /.option-->

                            <option value="2">2</option>
                            <!-- /.option-->

                            <option value="4">4</option>
                            <!-- /.option-->
                            <option value="8">8</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->
                  </div>
                  <!--/.row-->

                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="single-tab-select-box">
                        <h2>to</h2>

                        <div class="travel-select-icon">
                          <select class="form-control">
                            <option value="default">
                              enter your destination location
                            </option>
                            <!-- /.option-->

                            <option value="istambul">istambul</option>
                            <!-- /.option-->

                            <option value="mosko">mosko</option>
                            <!-- /.option-->
                            <option value="cairo">cairo</option>
                            <!-- /.option-->
                          </select><!-- /.select-->
                        </div>
                        <!-- /.travel-select-icon -->
                      </div>
                      <!--/.single-tab-select-box-->
                    </div>
                    <!--/.col-->

                    <!--/.col-->
                    <div class="clo-sm-5">
                      <div class="about-btn pull-right">
                        <button class="about-view travel-btn">search</button><!--/.travel-btn-->
                      </div>
                      <!--/.about-btn-->
                    </div>
                    <!--/.col-->
                  </div>
                  <!--/.row-->
                </div>
              </div>
              <!--/.tabpannel-->
            </div>
            <!--/.tab content-->
          </div>
          <!--/.desc-tabs-->
        </div>
        <!--/.single-travel-box-->
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<!--/.travel-box-->
<!--travel-box end-->