<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID FAQ</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $faq->pertanyaan }}</td>
                    <td>{{ $faq->jawaban }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-btn"
                            data-id="{{ $faq->id_faq }}"
                            data-pertanyaan="{{ $faq->pertanyaan }}"
                            data-jawaban="{{ $faq->jawaban }}"
                            data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        <form action="{{ route('admin.faq.delete', $faq->id_faq) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-links">
        {{ $faqs->links() }}
    </div>
</div>
