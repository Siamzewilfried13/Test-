<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Make Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-page {
            display: none;
        }
        .form-page.active {
            display: block;
        }
        .form-navigation {
            text-align: end;
            margin-top: 20px;
        }
        #submitReservation {
            padding: 10px 20px;
            width: 50%;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-navigation button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-navigation button:hover {
            background-color: #0056b3;
        }
        .form-element {
            margin-bottom: 20px;
        }
        .form-element label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-element input[type="text"],
        .form-element input[type="number"],
        .form-element input[type="date"],
        .form-element input[type="time"],
        .form-element select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="form-navigation">
                <button id="back" style="display: none;">Back</button>
                <button id="next">Next</button>
            </div>
        <div class="form-page active" id="passenger-details">
            <h2>Passenger Details</h2>
            <form id="form-passenger" action="save_reservation.php" method="post">
              <div class="form-element form-stack">
                  <label for="numb_children">Adult</label>
                  <input id="numb_adult" type="number" name="numb_adult">
              </div>
              <div class="form-element form-stack">
                  <label for="numb-Children">Children (2-11 years)</label>
                  <input id="numb_children" type="number" name="numb_children">
              </div>
              <div class="form-element form-stack">
                  <label for="Infant">Infant (under 2 years)</label>
                  <input id="Infant" type="number" name="infant">
              </div>
              <div class="form-element form-checkbox">
                  <input id="one_way" type="checkbox" name="fare" value="one_way" class="checkbox">
                  <label for="fare">Select your fare</label>
              </div>
              <div class="form-element form-checkbox">
                  <input id="round_trip" type="checkbox" name="round_trip" value="round_trip" class="checkbox">
                  <label for="round_trip">Round Trip</label>
              </div>
              <div class="form-element form-stack">
                  <label for="return_details">Return date</label>
                  <input id="return_details" type="date" name="return_details">
              </div>
              <div class="form-element form-stack">
                  <label for="message">Any Message</label>
                  <input id="message" type="text" name="message">
              </div>
            </form>
        </div>
        <div class="form-page" id="booking-details">
            <h2>Booking Details</h2>
            <form id="form-booking" action="save_reservation.php" method="post">
                <div class="form-element form-stack">
                    <label for="from_location">From</label>
                    <input id="from_location" type="text" name="from_location">
                </div>
                <div class="form-element form-stack">
                    <label for="to_destination">To</label>
                    <input id="to_destination" type="text" name="to_destination">
                </div>
                <div class="form-element form-stack">
                    <label for="departure_date">Departure date</label>
                    <input id="departure_date" type="date" name="departure_date">
                </div>
                <div class="form-element form-stack">
                    <label for="departure_time">Departure time</label>
                    <input id="departure_time" type="time" name="departure_time">
                </div>
                <div class="form-element form-stack">
                    <label for="number_of_seats">Number of seats</label>
                    <input id="number_of_seats" type="number" name="number_of_seats">
                </div>
                <div class="form-element form-stack">
                    <label for="preferred_agency">Preferred agency</label>
                    <select name="preferred_agency" id="preferred_agency">
                        <option value="">Select agency</option>
                        <option value="Douala">Douala</option>
                        <option value="Bafoussam">Bafoussam</option>
                        <option value="Dschang">Dschang</option>
                    </select>
                </div>
                <div class="form-element form-stack">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="">Select status</option>
                        <option value="CLASSIC">Classic</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>
                <button id="submitReservation" type="submit">Submit</button>         
        </div>
      </form>
    </div>

    <script>
        const nextPage = document.getElementById('next');
        const prevPage = document.getElementById('back');
        const passengerPage = document.getElementById('passenger-details');
        const bookingPage = document.getElementById('booking-details');
        const submitBtn = document.getElementById('submit');

        nextPage.addEventListener('click', function() {
            passengerPage.style.display = 'none';
            bookingPage.style.display = 'block';
            nextPage.style.display = 'none';
            prevPage.style.display = 'inline-block';
            submitBtn.style.display = 'inline-block';
        });

        prevPage.addEventListener('click', function() {
            bookingPage.style.display = 'none';
            passengerPage.style.display = 'block';
            nextPage.style.display = 'inline-block';
            prevPage.style.display = 'none';
            submitBtn.style.display = 'none';
        });
    </script>
</body>
</html>
