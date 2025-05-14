
<x-main>
    <h1 class="title is-3">All Archaeological Submissions</h1>

    @if(session('success'))
        <div class="notification is-success">
            {{ session('success') }}
        </div>
    @endif

    @if($submissions->isEmpty())
        <p>No submissions yet. Click "New Submission" to add one.</p>
    @else
        <table class="table is-fullwidth is-striped mt-4">
            <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Category</th>
                <th>GPS</th>
                <th>Date & Time</th>
                <th>Donate</th>
                <th>Material</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($submissions as $submission)
                <tr>
                    <td>
                        @if ($submission->picture)

                            <img src="{{ asset($submission->picture) }}" alt="Image" width="100" style="object-fit: cover;">
                        @else
                            No image
                        @endif
                    </td>



                    <td>{{ $submission->id }}</td>
                    <td>{{ $submission->category }}</td>
                    <td>{{ $submission->gps_location }}</td>
                    <td>{{ $submission->date_time }}</td>
                    <td>{{ $submission->donate ? 'Yes' : 'No' }}</td>
                    <td>{{ $submission->material }}</td>
                    <td>
                        <a href="{{ route('submissions.show', $submission) }}" class="button is-small is-info">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <x-slot name="buttons">
        <form action="{{ route('submissions.create') }}" method="GET" style="display: inline;">
            <button type="submit" class="footer-btn">New Submission</button>
        </form>

        <button class="footer-btn">Upload</button>
    </x-slot>
</x-main>
