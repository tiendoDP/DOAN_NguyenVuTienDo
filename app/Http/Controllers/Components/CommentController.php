<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Save comment to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'message' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        DB::beginTransaction();

        try {
            // Tạo bản ghi mới trong bảng Comments
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->product_id = $request->product_id;
            $comment->content = $validatedData['message'];
            $comment->rating = $validatedData['rating'];
            $comment->save();

            $data['user_name'] = $comment->user->name;
            $data['created_at'] = $comment->created_at;
            $data['content'] = $comment->content;
            $data['rating'] = $comment->rating;

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $commentImage = new CommentImage();
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('comments/comment_images'), $imageName);
                    $commentImage->comment_id = $comment->id;
                    $commentImage->image_path = 'comments/comment_images/' . $imageName;
                    $commentImage->save();
                }
            }

            $data['images'] = Comment::find($comment->id)->images;

            DB::commit();
            // Trả về kết quả thành công
            return response()->json(['success' => true, 'message' => 'Cảm ơn bạn đã đánh giá sản phẩm', 'data' => $data]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Xảy ra lỗi khi comment']);
        }
        
    }

}
