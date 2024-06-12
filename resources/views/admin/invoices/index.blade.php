@extends('admin.layout.main')
@section('title', 'DCM Contest')
@section('addStyle')
<style type="text/css">
  .page-loader {
    width: 100%;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Contested Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Contested Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <form id="filterStores">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <label>By Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" placeholder="Select Date Range" class="form-control float-right" name="get_date" value="" id="filter_range" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>By Referral</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-list"></i>
                        </span>
                      </div>
                      <select class="form-control" name="by_referral">
                        <option value="">Select Referral</option>
                        @foreach ($data['get_referral'] as $get_referral)
                        <option value="{{ $get_referral->by_referral }}">{{ $get_referral->by_referral }}</option>
                        @endforeach
  
                      </select>
                    </div>
                  </div>

                  <div class="col-md-1" style="display: inline-flex;justify-content: space-between;">
                    <button type="submit" class="btn btn-primary mt-32"><i class="fas fa-search"></i></button>
                    <div class="reset_button">

                    </div>
                  </div>
                  <div class="col-md-1">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div id="filterBlock">

          </div>

          <div class="card text-center">
            <div class="card-header">
              <div class="row mt-1" style="justify-content: center;">
                <span class="text-center mt-1">
                  <button class="btn btn-lg btn-primary" onclick="animateRandomUsernames()">Make a Toss</button>
                </span>
              </div>
            </div>
          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>

<!-- Winner Modal Start-->
<div id="winner-modal" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="winner-modal-label">DCM Contest Winner is...</h3>
      </div>
      <div class="modal-body">
        <div id="random-usernames-container"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Winner Modal End -->

<div class="modal fade" id="editCategoryFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@section('addStyle')
<style>
  /* Animation styles */
  .animation-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    font-size: 24px;
    font-weight: bold;
    border: 2px solid #333;
    border-radius: 10px;
    margin-bottom: 20px;
    animation-name: randomUserAnimation;
    animation-duration: 3s;
    animation-timing-function: ease;
    animation-iteration-count: infinite;
  }

  @keyframes randomUserAnimation {

    0%,
    100% {
      opacity: 0;
    }

    50% {
      opacity: 1;
    }
  }
</style>
@endsection

@section('addScript')
<script>
  $(function() {

    loadUsers();

    $('#filter_range').daterangepicker({
      autoUpdateInput: false,
      locale: {
        format: 'DD/MMM/YYYY',
        cancelLabel: 'Clear'
      }
    });

    $('input[name="get_date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MMM/YYYY') + ' - ' + picker.endDate.format('DD/MMM/YYYY'));
    });

    $('input[name="get_date"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

    $(document).on('submit', "#add_category_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_category_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $('#viewInvoiceModal').modal('hide');
          loadUsers();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

    $(document).on('submit', "#edit_job_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_job_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $('#editCategoryFormModal').modal('hide');
          loadUsers();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteInvoices', function() {
      var id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure yo delete all user invoices ?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/panel/invoices/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Invoices Successfully Deleted.'
              });
              loadUsers();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Cannot deleted this Invoice !"
              });
            }
          });
        }
      });
    });


    $(document).on('click', '.editCategory', function() {
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="50px" style="margin:150px auto;"></div>');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/invoices/view')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
      });
    });

  });


  $("#filterStores").submit(function(event) {
    $('#filterBlock').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="30px"></div>');
    var url = "{{route('admin.invoices.filter')}}";
    var form = $(this);
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      encode: true,
    }).done(function(data) {
      $('#filterBlock').html(data);
      $("#categoryTableBody").DataTable();
      $('.reset_button').html('<button type="button" class="btn btn-default mt-32 reset_filter" title="Reset Filter"><i class="fas fa-times"></i></button>')
    });

    event.preventDefault();
  });

  $(document).on('click', '.reset_filter', function() {
    loadRetailers();
    $("#filterStores").trigger('reset');
    $('.reset_button').html('');
  });

  function loadUsers() {

    var url = "{{route('admin.invoices.load')}}";
    $('#filterBlock').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="30px"></div>');
    $.get(url, function(data) {
      $('#filterBlock').html(data);
      //$('#categoryTable').DataTable();
    });
  }

  ///DCM Contest Toss Start//
  document.getElementById('select-winner-button').addEventListener('click', function() {
    this.disabled = true;
    animateRandomUsername();
  });

  function closeModal() {
    var modal = document.getElementById('winner-modal');
    modal.style.display = 'none';
  }

  // Animation function to display random usernames
  function animateRandomUsernames() {

    var modal = document.getElementById('winner-modal');
    modal.style.display = 'block';

    var loadingImage = document.createElement('img');
    loadingImage.src = '{{URL::to("/public/web-loader.gif")}}';
    loadingImage.alt = 'Loading';
    loadingImage.style.display = 'block';
    loadingImage.style.margin = '0 auto';
    loadingImage.style.height = '200px';
    loadingImage.style.width = '200px';

    var randomUsernamesContainer = document.getElementById('random-usernames-container');
    randomUsernamesContainer.innerHTML = '';
    randomUsernamesContainer.appendChild(loadingImage);

    setTimeout(function() {

      fetch('{{ route("admin.invoices.toss") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        })
        .then(response => response.json())
        .then(data => {

          var usernames = data.usernames;
          var winnerName = data.winner;
          var user_id = data.user_id;

          var duration = 3000;
          var interval = 100;
          var steps = duration / interval;

          var currentStep = 0;
          var intervalId = setInterval(function() {
            currentStep++;
            var randomIndex = Math.floor(Math.random() * usernames.length);
            var randomUsername = usernames[randomIndex];

            var animationContainer = document.createElement('div');
            animationContainer.className = 'animation-container';
            animationContainer.textContent = randomUsername;

            randomUsernamesContainer.innerHTML = '';
            randomUsernamesContainer.appendChild(animationContainer);

            if (winnerName != 'no_winner') {

              if (currentStep === steps) {
                clearInterval(intervalId);
                showWinnerImage(winnerName, user_id);

              }
            } else {
              clearInterval(intervalId);
              NoWinner('No Winners');
            }

          }, interval);
        })
        .catch(error => {
          console.error('Error:', error);
        });

    }, 1000);
  }

  // Function to show the winner's image and name
  function showWinnerImage(winnerName, user_id) {
    var randomUsernamesContainer = document.getElementById('random-usernames-container');

    var winnerImage = document.createElement('img');
    winnerImage.src = '{{URL::to("/public/winning.gif")}}';
    winnerImage.alt = 'Winner Image';
    winnerImage.style.display = 'block';
    winnerImage.style.margin = '0 auto';
    winnerImage.style.height = '220px';
    winnerImage.style.width = '220px';

    var winnerNameElement = document.createElement('hr');
    var winnerNameElement = document.createElement('p');
    var winnerNameElement = document.createElement('h3');
    var winnerLinkElement = document.createElement('a');

    var winnerLinkElement = document.createElement('a');

    winnerLinkElement.href = "javascript:void(0)";
    winnerLinkElement.className = "btn btn-lg btn-success editCategory";
    winnerLinkElement.style.width = '220px';
    winnerLinkElement.style.textTransform = 'uppercase';
    winnerLinkElement.title = "More Details";
    winnerLinkElement.setAttribute("data-id", btoa(user_id));
    winnerLinkElement.textContent = winnerName;

    winnerNameElement.appendChild(document.createTextNode(' '));

    winnerNameElement.style.textAlign = 'center';
    randomUsernamesContainer.innerHTML = '';

    randomUsernamesContainer.appendChild(winnerImage);
    randomUsernamesContainer.appendChild(winnerNameElement);
    winnerNameElement.appendChild(winnerLinkElement);
  }

  function NoWinner(winnerName) {

    var randomUsernamesContainer = document.getElementById('random-usernames-container');

    var winnerNameElement = document.createElement('hr');
    var winnerNameElement = document.createElement('p');
    var winnerNameElement = document.createElement('h3');
    var winnerLinkElement = document.createElement('a');

    var winnerLinkElement = document.createElement('a');

    winnerLinkElement.style.width = '220px';
    winnerLinkElement.style.textTransform = 'uppercase';


    winnerLinkElement.textContent = winnerName;
    winnerNameElement.appendChild(document.createTextNode(' '));

    winnerNameElement.style.textAlign = 'center';

    randomUsernamesContainer.innerHTML = '';

    randomUsernamesContainer.appendChild(winnerNameElement);
    winnerNameElement.appendChild(winnerLinkElement);

  }
  ///DCM Contest Toss End//
</script>

@endsection