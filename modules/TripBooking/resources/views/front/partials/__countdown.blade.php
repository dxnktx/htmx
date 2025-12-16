<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0 text-center">Tết Ất Tỵ</h4>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <h3 id="days" class="display-4">00</h3>
                            <p>Ngày</p>
                        </div>
                        <div class="col-3">
                            <h3 id="hours" class="display-4">00</h3>
                            <p>Giờ</p>
                        </div>
                        <div class="col-3">
                            <h3 id="minutes" class="display-4">00</h3>
                            <p>Phút</p>
                        </div>
                        <div class="col-3">
                            <h3 id="seconds" class="display-4">00</h3>
                            <p>Giây</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Set the date we're counting down to (1 month from now)
const countDownDate = new Date().getTime() + (30 * 24 * 60 * 60 * 1000);

// Update the countdown every 1 second
const x = setInterval(function() {
  // Get today's date and time
  const now = new Date().getTime();

  // Find the distance between now and the countdown date
  const distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result
  document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
  document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
  document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
  document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

  // If the countdown is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("days").innerHTML = "00";
    document.getElementById("hours").innerHTML = "00";
    document.getElementById("minutes").innerHTML = "00";
    document.getElementById("seconds").innerHTML = "00";
  }
}, 1000);
</script>
@endpush('scripts')