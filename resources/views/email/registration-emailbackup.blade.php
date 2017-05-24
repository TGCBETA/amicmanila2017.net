<p>
    Name: {{ $registration->firstname }} {{ $registration->lastname }}
</p>

<p>
    Nationality: {{ $registration->nationality }}
</p>

<p>
    Gender: {{ ($registration->gender == 'male') ? 'Male' : 'Female' }}
</p>

<p>
    Phone: {{ $registration->phone }}
</p>

<p>
    Email: {{ $registration->email }}
</p>