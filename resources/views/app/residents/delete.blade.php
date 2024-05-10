<!-- Delete Button -->
<form action="{{ route('resident.destroy', ['id' => $resident->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete {{$resident->name}}')">Delete</button>
</form>