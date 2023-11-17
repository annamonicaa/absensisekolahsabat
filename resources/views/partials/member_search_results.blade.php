@foreach ($members as $member)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="member_ids[]" value="{{ $member->id }}" id="member_{{ $member->id }}">
        <label class="form-check-label" for="member_{{ $member->id }}">
            {{ $member->name }}
        </label>
    </div>
@endforeach