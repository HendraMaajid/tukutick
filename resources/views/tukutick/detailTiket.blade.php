@extends('layouts.app2-detailEvent')
@section('title', 'Pembayaran')
@section('style')
<style>
.separator {
  margin: 20px 0;
  border: 1px solid #ccc;
}

.separator1 {
  margin: 20px 0;
  border: 1px dashed #ccc;
}

.attendeeTable {
  background: #E6E6FA;
  padding: 10px;
  text-transform: uppercase;
}

.eventTable {
  text-align: center;
}

.organizerArea {
  text-align: right;
}

.titleArea {
  background: #E6E6FA;
  padding: 10px;
}

.logo {
  width: 130px;
  align: right;
  margin-top: -20px;
}

.logoArea {
  text-align: right;
}

.ticket {
  font-family: system-ui;
  color: white;
  text-align: left;
  font-family: Courier;
  margin: 20px;
  text-align: left;
  border: 2px solid #ccc;
  padding: 20px;
  max-width: 700px;
  margin: 0 auto;
  background-color: #fff;
  color: #000;
}

.qr-code {
  max-width: 400px;
}

.qrcodeArea {
  text-align: center;
}

.cutArea {
  text-align: center;
  font-size: 15px;
  background: #E6E6FA;
  padding: 10px;
}
</style>
@endsection
@section('content')
<div class="d-flex p-3" style="background-color: #094067;">
  <a href="{{route(tiket.show)}}" class="text-decoration-none btn-outline-white"
    style="padding: 0.75rem 2rem; font-size: 1rem;float-left">
    Back</a>
  <h1 class="h1 fw-bolder d-block mx-auto text-light">Ticket Detail</h1>
</div>

<div class="container w-full p-5">
  <div class="ticket">
    <div class="logoArea">
      <p class="navbar-brand fs-2">TukuTick</p>
    </div>

    <div class="qrcodeArea">
      <!--<h3>QR Code:</h3> -->
      <br> <img class="logo" src="{{asset('assets/img/img_tukutick/barcode.jpg')}}"><br><br>
      <p>Ticket ID: <b>[Ticket_id]</b></p>
      <p>Ticket Price: [paid_tickets]</p>
    </div>

    <div class="attendeeTable">
      <table style="width:100%">
        <tr>
          <td style="width:70%"><b>[customer_name]</b></td>
          <td>ID: [Customer_id]</td>
        </tr>
      </table>
    </div>

    <div class="separator"></div>

    <div class="titleArea">
      <div class="eventTable">
        <table style="width:100%">
          <tr>
            <td style="width:50%" " font-size: 30px">Date: <br><b>[event_start_date]</b></td>
            <td style="width:50%">Time: <br><b>[event_start_time]</b></td>
          </tr>
        </table>
      </div><br>
      <h2>[event_title]</h2>
      <p>Location: [event_location]</p>
    </div>

    <div class="separator"></div>

    <div class="organizerArea">
      <h3>Organizer Information:</h3>
      <p>Organizer: [organizer_name]</p>
      <p>Email: <a href="mailto:[organizer_email]">[organizer_email]</a></p>
    </div>

    <div class="separator1"></div>

    <div class="cutArea">
      <h3>[event_title]</h3>
      <p>Ticket ID: [ticket_id]</p>
      <p>[event_start_date]/[event_start_time]</p>
    </div>
  </div>
</div>


@endsection

@section('script')

@endsection