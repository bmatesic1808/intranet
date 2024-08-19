<table style="border-collapse: collapse;">
    <thead>
        <tr style="background: #f1f5f9;">
            <th style="width: 70%; text-align: left; font-size: 1.25rem; padding: 1rem; border: 1px solid #eee">Ime i prezime</th>
            <th style="width: 30%; text-align: left; font-size: 1.25rem; padding: 1rem; border: 1px solid #eee;">Rođendan</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($users as $user)
            <tr style="">
                <td style="padding: 0.5rem 1rem; border: 1px solid #eee;">{{ $user->name }}</td>
                <td style="padding: 0.5rem 1rem; border: 1px solid #eee;">
                    @if($user->personalInformation)
                        {{ Carbon\Carbon::parse($user->personalInformation->birthday)->format('d/m/Y') }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>