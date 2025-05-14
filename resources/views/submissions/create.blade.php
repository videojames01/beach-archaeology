<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">Create a new Archaeological Submission</h1>
            </div>
        </div>

        <div class="box">
            <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2 class="subtitle is-6 is-italic">
                    Please fill out all fields and click 'Save'
                </h2>

                {{-- Category --}}
                <div class="field">
                    <label class="label">Category</label>
                    <div class="control">
                        <input type="text" name="category" class="input" value="{{ old('category') }}" placeholder="Category">
                    </div>
                    @error('category')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- GPS Location --}}
                <div class="field">
                    <label class="label">GPS Location</label>
                    <div class="control">
                        <div id="map" style="height: 300px;"></div>
                        <input type="hidden" name="gps_location" id="gps_location" value="{{ old('gps_location', '52.379189,4.90093') }}">
                        <p id="gps_display" class="mt-2 has-text-grey">Awaiting GPS location...</p>
                    </div>
                    @error('gps_location')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Picture --}}
                <div class="field">
                    <label class="label">Picture</label>
                    <div class="control">
                        <input type="file" name="picture" class="input" accept="image/*">
                    </div>
                    @error('picture')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Date & Time --}}
                <div class="field">
                    <label class="label">Date & Time</label>
                    <div class="control">
                        <input type="datetime-local" name="date_time" class="input" value="{{ old('date_time') }}">
                    </div>
                    @error('date_time')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Donate --}}
                <div class="field">
                    <label class="label">Donate</label>
                    <div class="control">
                        <input type="checkbox" name="donate" class="checkbox" value="1" {{ old('donate') ? 'checked' : '' }}>
                    </div>
                    @error('donate')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Extra Remarks --}}
                <div class="field">
                    <label class="label">Extra Remarks</label>
                    <div class="control">
                        <textarea name="extra_remarks" class="textarea" placeholder="Any additional comments">{{ old('extra_remarks') }}</textarea>
                    </div>
                    @error('extra_remarks')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Expert Info Toggle --}}
                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" id="toggle-extra" {{ old('measurements') || old('material') || old('timeperiod') ? 'checked' : '' }}>
                        Expert Information
                    </label>
                </div>

                {{-- Expert Fields --}}
                <div id="extra-info" style="{{ old('measurements') || old('material') || old('timeperiod') ? '' : 'display: none;' }}">
                    <div class="field">
                        <label class="label">Measurements</label>
                        <div class="control">
                            <input type="text" name="measurements" class="input" value="{{ old('measurements') }}" placeholder="Measurements">
                        </div>
                        @error('measurements')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Material</label>
                        <div class="control">
                            <input type="text" name="material" class="input" value="{{ old('material') }}" placeholder="Material">
                        </div>
                        @error('material')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Time Period</label>
                        <div class="control">
                            <input type="text" name="timeperiod" class="input" value="{{ old('timeperiod') }}" placeholder="Time Period">
                        </div>
                        @error('timeperiod')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary">Save</button>
                    </div>
                    <div class="control">
                        <a href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                    </div>
                    <div class="control">
                        <button type="reset" class="button is-warning">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <x-slot name="buttons">
        <a href="{{ route('submissions.index') }}" class="footer-btn">Back to List</a>
    </x-slot>
</x-main>
