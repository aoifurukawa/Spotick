<div class="modal fade" id="delete-update-{{$post->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Your Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>

            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <p class="fw-bold">{{ $post->title }}</p>
                    <p>Do you really want to update this Post?</p>

                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <label for="title-{{ $post->id }}" class="form-label fw-bold">Title of event</label>
                                <input type="text" name="title" id="title-{{ $post->id }}" class="form-control" value="{{ old('title', $post->title) }}">
                                @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-4">
                                <label for="content-{{ $post->id }}" class="form-label fw-bold">Content</label>
                                <select name="content" id="content-{{ $post->id }}" class="form-select">
                                    <option value="" hidden></option>
                                    @foreach ($all_content as $content)
                                    <option value="{{ $content->name }}"
                                        @if (old('content', $post->content) == $content->name) selected @endif>
                                        {{ $content->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('content')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <label for="description" class="form-label fw-bold mt-3">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="row">
                            <div class="col-4">
                                <label for="date" class="form-label fw-bold mt-3">Date</label>
                                <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date', $post->date) }}">
                                @error('date')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="col-4">
                                <label for="price" class="form-label fw-bold mt-3">Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="$" value="{{ old('price', $post->price) }}">
                                @error('price')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="col-4">
                                <label for="number" class="form-label fw-bold mt-3">Number of tickets</label>
                                <input type="number" name="number_of_tickets" id="number" class="form-control" value="{{ old('number_of_tickets', $post->number_of_tickets) }}">
                                @error('number_of_tickets')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <label for="venue" class='form-label fw-bold mt-3'>Venue</label>
                        <input type="text" name="venue" id="venue" class="form-control" value="{{ old('venue', $post->venue) }}">
                        @error('venue')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <label for="address" class='form-label fw-bold mt-3'>Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $post->address) }}">
                        @error('address')
                            <div class="text-danger">{{$message}}</div>
                        @enderror



                        <!-- 省略：他のinputフィールドもvalue="{{ old('○○', $post->○○) }}"をセット -->

                        <div class="row">
                            <div class="col-4">
                                <label for="picture1-{{ $post->id }}" class="form-label fw-bold mt-3">Picture 1</label>
                                <input class="form-control mb-3" type="file" id="picture1-{{ $post->id }}" name="picture_1">
                                <img src="{{ $post->picture_1 }}" alt="" style="width: 80%; height: 180px; border-radius: 50px; border: 3px solid black;">                                                                                                                                    
                                @error('picture_1')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-4">
                                <label for="picture2-{{ $post->id }}" class="form-label fw-bold mt-3">Picture 2</label>
                                <input class="form-control mb-3" type="file" id="picture2-{{ $post->id }}" name="picture_2">
                                <img src="{{ $post->picture_2 }}" alt="" style="width: 80%; height: 180px; border-radius: 50px; border: 3px solid black;">
                                @error('picture_2')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-4">
                                <label for="picture3-{{ $post->id }}" class="form-label fw-bold mt-3">Picture 3</label>
                                <input class="form-control mb-3" type="file" id="picture3-{{ $post->id }}" name="picture_3">
                                <img src="{{ $post->picture_3 }}" alt="" style="width: 80%; height: 180px; border-radius: 50px; border: 3px solid black;">
                                @error('picture_3')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <!-- 他のフィールドも同様にidとvalueを整理 -->
                        <label for="sponsor_name" class="form-label fw-bold mt-3">Your Name</label>
                        <input type="text" name="sponsor_name" id="sponsor_name" class="form-control" value="{{ old('sponsor_name', $post->sponsor_name) }}">
                        @error('sponsor_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <label for="email" class="form-label fw-bold mt-3">Mail Adress</label>
                        <input type="email" name="mail_address" id="email" class="form-control"value="{{ old('mail_address', $post->mail_address) }}">
                        @error('mail_address')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <label for="insta" class="form-label fw-bold mt-3">Instagram Account URL</label>
                        <input type="url" name="insta_url" id="insta" class="form-control" value="{{ old('insta_url', $post->insta_url) }}">

                        <label for="facebook" class="form-label fw-bold mt-3">FaceBook Account URL</label>
                        <input type="url" name="facebook_url" id="facebook" class="form-control" value="{{ old('facebook_url', $post->facebook_url) }}">

                        <label for="X" class="form-label fw-bold mt-3">X Account URL</label>
                        <input type="url" name="x_url" id="X" class="form-control" value="{{ old('x_url', $post->x_url) }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stop</button>
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
