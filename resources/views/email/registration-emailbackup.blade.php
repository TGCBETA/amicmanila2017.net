<h3>Details</h3>
    <div class="row">
        <p>
            <b>Date/Time:</b> {{ $registration->created_at }}
        </p>

        <p>
            <b>Name:</b> {{ $registration->firstname }} {{ $registration->lastname }}
        </p>

        <p>
            <b>Nationality:</b> {{ $registration->nationality }}
        </p>

        <p>
            <b>Gender:</b> {{ ($registration->gender == 'male') ? 'Male' : 'Female' }}
        </p>

        <p>
            <b>Phone:</b> {{ $registration->phone }}
        </p>

        <p>
            <b>Email:</b> {{ $registration->email }}
        </p>
    </div>

    <div class="row">
        <p>
            <b>Registration Type:</b> {{ $registration->reg_type }}
            <br />

            @if($registration->reg_rate == 250.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - AMIC Member
            @elseif($registration->reg_rate == 400.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Non-AMIC Member
            @elseif($registration->reg_rate == 250.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Foreign Student
            @elseif($registration->reg_rate == 3000.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - AMIC Member
            @elseif($registration->reg_rate == 5000.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Non-Amic Member
            @elseif($registration->reg_rate == 800.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Local Student
            @elseif($registration->reg_rate == 500.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Local Student Observer
            @elseif($registration->reg_rate == 1000.00)
            <b>Rate:</b> {{ $registration->reg_rate }} - Conference Organized City Tour
            @endif
            <br />

            @if($registration->reg_type == 0)
                <b>Days:</b> 1st day
            @elseif($registration->reg_type == 1)
                <b>Days:</b> 2st day
            @elseif($registration->reg_type == 2)
                <b>Days:</b> 1st and 2nd day  
            @endif
            <br />
            <b>Conference Organized City tour:</b> {{ ($registration->l_city_tour_rate == '1000.00') ? 'Yes' : 'No' }}
            <br />
            <b>Total Fee:</b> {{ ($registration->currency == 'U') ? 'USD' : 'PHP' . ' ' . $registration->total_fee }}
        </p>

        <p>
            <b>Payment Method: </b> {{ $registration->payment_opt }}
        </p>
    </div>