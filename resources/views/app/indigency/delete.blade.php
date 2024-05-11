<!-- Delete Button -->
<form action="{{ route('indigency.destroy', ['id' => $indigency->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete {{$indigency->name}}')">Delete</button>
</form>