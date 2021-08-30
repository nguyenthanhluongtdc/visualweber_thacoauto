<?php

return [
    'email' => [
        'templates' => [
            'title'       => 'Bình Luận',
            'description' => 'Gửi đến địa chỉ email khi có người dùng bình luận',
            'to_user'     => [
                'title'       => 'Gửi email đến người dùng',
                'description' => 'Thông báo khi có người trả lời bình luận',
            ],
            'to_poster'   => [
                'title'       => 'Gửi email đến người tạo bài viết',
                'description' => 'Thông báo với người tạo bài viết khi có bình luận về bài viết của họ',
            ],
        ],
    ],
];
