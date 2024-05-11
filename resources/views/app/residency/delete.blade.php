<!-- Delete Button -->
<form action="{{ route('clearance.destroy', ['id' => $residency->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete {{$residency->name}}')">Delete</button>
</form>