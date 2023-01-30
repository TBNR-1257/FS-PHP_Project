<?php

class Assignment
{
    public static function getAllAssignments()
    {
        return DB::connect()->select(
            'SELECT * FROM assignments',
            [],
            true
        );
    }


    public static function getAssignmentById( $assignment_id )
    {
        return DB::connect()->select(
            'SELECT * FROM assignments WHERE id = :id',
            [
                'id' => $assignment_id
            ]
        );
    }


     // retrieve all the published posts
     public static function getPublishAssignments()
     {
        return DB::connect()->select(
            'SELECT * FROM assignments WHERE status = :status ORDER BY id DESC',
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
            'INSERT INTO assignments (title , content , image_url , video_url , user_id ) 
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



    // update assignment
    public static function update( $id, $title, $content, $image_url, $video_url, $status )
    {
        return DB::connect()->update(
            'UPDATE assignments SET title = :title, content = :content, image_url = :image_url, video_url = :video_url, 
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

    // complete assignment
    public static function completed( $id, $complete )
    {
        return DB::connect()->update(
            'UPDATE assignments SET complete = :complete WHERE id = :id' ,
            [
                'id' => $id,
                'complete' => $complete
            ]
        );
    }


    // delete post
    public static function delete( $id )
    {
        return DB::connect()->delete(
            'DELETE FROM assignments where id = :id',
            [
                'id' => $id
            ]
        );
    }




}