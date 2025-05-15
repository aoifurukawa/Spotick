<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    private $post;

    private $content;

    public function __construct(Post $post, Content $content)
    {
        $this->post = $post;
        $this->content = $content;
    }

    public function page_show()
    {
        $user = Auth::user();
        $all_content = $this->content->oldest()->get();

        return view('sponsor.post')->with('user', $user)
            ->with('all_content', $all_content);
    }

    public function store(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'content' => 'required|string|max:50', // 文章なら text に直したほうがいいかも
            'description' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer|min:0',
            'number_of_tickets' => 'required|integer|min:1',
            'venue' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'picture_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ファイルアップロードなら別の対応が必要
            'picture_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_name' => 'required|string|max:255',
            'mail_address' => 'required|email',
            'insta_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
        ]);

        $this->post->user_id = $id;
        // dd($this->post->user_id);
        $this->post->title = $request->title;
        // dd($this->post->title);
        $this->post->content = $request->content;
        // dd($this->post->content);
        $this->post->description = $request->description;
        // dd($this->post->description);
        $this->post->date = $request->date;
        // dd($this->post->date);
        $this->post->price = $request->price;
        // dd($this->post->price);
        $this->post->number_of_tickets = $request->number_of_tickets;
        // dd($this->post->number_of_tickets);
        $this->post->venue = $request->venue;
        // dd($this->post->venue);
        $this->post->address = $request->address;
        // dd($this->post->address);

        if ($request->hasFile('picture_1')) {
            $file = $request->file('picture_1');
            $this->post->picture_1 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_2')) {
            $file = $request->file('picture_2');
            $this->post->picture_2 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_3')) {
            $file = $request->file('picture_3');
            $this->post->picture_3 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        $this->post->sponsor_name = $request->sponsor_name;
        $this->post->mail_address = $request->mail_address;
        $this->post->insta_url = $request->insta_url;
        $this->post->facebook_url = $request->facebook_url;
        $this->post->x_url = $request->x_url;

        $this->post->save();

        return redirect()->route('home');

    }

    public function show($id)
    {

        $user = auth()->user();
        $post_detail = $this->post->findOrFail($id);

        // 仮にUserモデルに住所と空港が登録されてると仮定
        $user_address = $user->address;
        $user_airport = $user->airport;

        $venue = $post_detail->venue; // 例: "幕張メッセ"
        $event_date = $post_detail->date; // 例: "2025-04-29"

        $prompt = "
                    私は {$event_date} に {$venue} で開催されるイベントに参加します。
                    自宅は {$user_address} にあり、よく利用する空港は {$user_airport} です。

                    以下の内容について、200単語ほどの英語でわかりやすく丁寧に教えてください。

                    【1. アクセス方法】
                    自宅（{$user_address}）または空港（{$user_airport}）から、イベント会場（{$venue}）までの最適なアクセス方法を提案してください。
                    公共交通機関（電車・飛行機・バスなど）や乗り継ぎがある場合は、わかりやすく時系列で説明してください。

                    【2. 宿泊施設の提案】
                    イベント会場（{$venue}）周辺でおすすめのホテルを、価格帯ごとにいくつか紹介してください。
                    それぞれのホテルについて、アクセスの良さ・施設の特徴・おすすめポイントなども記載してください。

                    【3. 観光スポット】
                    イベント当日（{$event_date}）やその前後に訪れるべき、{$venue} 周辺の観光スポットを提案してください。
                    歴史的な場所・グルメスポット・自然・アクティビティなど、ジャンルごとに紹介してください。

                    【4. 予想される旅行予算】
                    上記の内容をもとに、交通費・宿泊費・観光費・食費などを含めた、おおよその旅行予算を提案してください。
                    予算は「節約プラン」「スタンダードプラン」「贅沢プラン」の3段階であると嬉しいです。

                    全体的に旅行初心者にもわかりやすい、親切で丁寧な説明をお願いします。
                    ";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('services.openai.api_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a travel assistant.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'temperature' => 0.7,
            'max_tokens' => 1000,
        ]);

        $chatResponse = $response->json()['choices'][0]['message']['content'] ?? '情報を取得できませんでした。';

        // $answer = response()->json(['recommendation' => $chatResponse]);
        $answer = $chatResponse;

        return view('sponsor.event-page')->with('post_detail', $post_detail)
            ->with('answer', $answer);
    }

    public function research(Request $request)
    {
        $query = $this->post->query();
        $title = '';
        if ($request->filled('title')) {
            $query->where('title', 'like', '%'.$request->title.'%');
            $title = $request->title;
        }

        $venue = '';
        if ($request->filled('venue')) {
            $query->where('venue', 'like', '%'.$request->venue.'%');
            $venue = $request->venue;
        }

        $selected_content = '';
        if ($request->filled('content')) {
            $query->where('content', $request->content);
            $selected_content = $request->content;
        }

        $selected_date = '';
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
            $selected_date = $request->date;
        }

        $start_term = '';
        $end_term = '';
        if ($request->filled('start_term') && $request->filled('end_term')) {
            $query->whereBetween('date', [$request->start_term, $request->end_term]);
            $start_term = $request->start_term;
            $end_term = $request->end_term;
        }

        $price = '';
        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
            $price = $request->price;
        }

        $results = $query->get();

        $all_content = $this->content->oldest()->get();

        return view('research-result')->with('results', $results)
            ->with('title', $title)
            ->with('venue', $venue)
            ->with('selected_content', $selected_content)
            ->with('selected_date', $selected_date)
            ->with('start_term', $start_term)
            ->with('end_term', $end_term)
            ->with('price', $price)
            ->with('all_content', $all_content);
    }

    public function show_participants($id)
    {
        $posts = $this->post->findOrFail($id);

        return view('sponsor.participant-list')->with('posts', $posts);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'content' => 'required|string|max:50', // 文章なら text に直したほうがいいかも
            'description' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer|min:0',
            'number_of_tickets' => 'required|integer|min:1',
            'venue' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'picture_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ファイルアップロードなら別の対応が必要
            'picture_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_name' => 'required|string|max:255',
            'mail_address' => 'required|email',
            'insta_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
        ]);

        $updated_post = $this->post->findOrFail($id);
        $updated_post->title = $request->title;
        $updated_post->content = $request->content;
        $updated_post->description = $request->description;
        $updated_post->date = $request->date;
        $updated_post->price = $request->price;
        $updated_post->number_of_tickets = $request->number_of_tickets;
        $updated_post->venue = $request->venue;
        $updated_post->address = $request->address;
        $updated_post->sponsor_name = $request->sponsor_name;
        $updated_post->mail_address = $request->mail_address;
        $updated_post->insta_url = $request->insta_url;
        $updated_post->facebook_url = $request->facebook_url;
        $updated_post->x_url = $request->x_url;

        // picture
        if ($request->hasFile('picture_1')) {
            $file = $request->file('picture_1');
            $updated_post->picture_1 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_2')) {
            $file = $request->file('picture_2');
            $updated_post->picture_2 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_3')) {
            $file = $request->file('picture_3');
            $updated_post->picture_3 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        $updated_post->save();

        return redirect()->route('reservation.show');
    }

    public function destroy($id)
    {
        $destroy_post = $this->post->findOrFail($id);
        $destroy_post->delete();

        return redirect()->route('reservation.show');
    }
}
