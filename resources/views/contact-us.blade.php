@extends("layouts.app")

@section("content")
<div class="container my-5" style="min-height: 100vh">
    <h3 class="text-center fw-bold"><span class="text-primary fs-1 me-2">Contact</span> Us</h3>

    <form class="row g-3 bg-white mt-5 p-5 w-75 mx-auto">
        <div class="col-md-6 mb-4">
          <label for="FirstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="FirstName" placeholder="First Name">
        </div>
        <div class="col-md-6 mb-4">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" placeholder="Last Name">
        </div>
        <div class="col-md-6 mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="col-md-6 mb-4">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" placeholder="Phone">
          </div>
        <div class="col-12 mb-4">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" placeholder="Write a subject for your message">
        </div>
        <div class="col-12 mb-4">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" placeholder="Leave your message here" id="message" rows="5"></textarea>
        </div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary px-5 fs-5 mt-3">Send</button>
        </div>
      </form>
</div>
@endsection