@extends('front.inc.master')

@section('title')
Make An Appointment - VCare
@endsection

@section('content')

    <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
            <img src="../assets/images/major.jpg" alt="doctor" class="img-fluid rounded-circle" height="150"
                width="150">
            <div class="details-info d-flex flex-column gap-3 ">
                <h4 class="card-title fw-bold">Doctor name</h4>
                <div class="d-flex gap-3 align-bottom">
                    <ul class="rating">
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                    </ul>
                    <a href="#" class="align-baseline">submit rating</a>
                </div>
                <h6 class="card-title fw-bold">doctor major and more info about the doctor in summary</h6>
            </div>
        </div>
        <hr />
        <form class="form">
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>

    </div>

@endsection