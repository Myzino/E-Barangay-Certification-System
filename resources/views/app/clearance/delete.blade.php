<!-- Delete Button -->
<form action="{{ route('clearance.destroy', ['id' => $clearance->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete {{$clearance->name}}')">Delete</button>
</form>