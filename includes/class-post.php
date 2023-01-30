<?php

class Post
{
    public static function getAllPosts()
    {
        return DB::connect()->select(
            'SELECT * FROM posts ORDER BY id DESC',
            [],
            true
        );
    }


    public static function getPostById( $post_id )
    {
        return DB::connect()->select(
            'SELECT * FROM posts WHERE id = :id',
            [
                'id' => $post_id
            ]
        );
    }


     // retrieve all the published posts
     public static function getPublishPosts()
     {
        return DB::connect()->select(
            'SELECT * FROM posts WHERE status = :status ORDER BY id DESC',
            [
                'status' => 'publish'
            ],
            true
        );
     }



    // add new post
    public static function add( $title, $content, $image_url, $video_url )
    {
        return DB::connect()->insert(
            'INSERT INTO posts (title , content , image_url , video_url , user_id ) 
            VALUES (:title, :content, :image_url , :video_url , :user_id )',
            [
                'title' => $title,
                'content' => $content,
                'image_url' => $image_url,
                'video_url' => $video_url,
                'user_id' => $_SESSION['user']['id']
            ]
        );
    }



    // update post
    public static function update( $id, $title, $content, $image_url, $video_url, $status )
    {
        return DB::connect()->update(
            'UPDATE posts SET title = :title, content = :content, image_url = :image_url, video_url = :video_url, 
            status = :status WHERE id = :id',
            [
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'image_url' => $image_url,
                'video_url' => $video_url,
                'status' => $status
            ]
        );
    }



    // delete post
    public static function delete( $id )
    {
        return DB::connect()->delete(
            'DELETE FROM posts where id = :id',
            [
                'id' => $id
            ]
        );
    }



}