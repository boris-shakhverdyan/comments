<?php

function tree($list)
{ ?>
    <ul>
        <?php
        foreach ($list as $item): ?>
            <li>
                <span style="display: flex">
                    <?= "<span style='font-weight: bolder;'>" . $item->user->username . "(" . $item->children->count() . ")</span>" . ":" . $item->body ?>
                    <?php if (auth()->user()): ?>
                        <form action="/" method="POST">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <input type="hidden" name="parent_id" value="<?= $item->id ?>">
                            <input name="body" placeholder="Comment body" />
                            <button>Leave comment</button>
                        </form>
                    <?php endif; ?>
                </span>
                <?php
                if ($item->children) {
                    tree($item->children);
                }
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php }

// @foreach ($comments as $comment)
//     <li>
//         <span style="display: flex">
//             {{ $comment->user->username }}: {{ $comment->body }}
//             <form action="/" method="POST">
//                 @csrf
//                 <input type="hidden" name="parent_id" value="{{ $comment->id }}">
//                 <input name="body" placeholder="Comment body" />
//                 <button>Leave comment</button>
//             </form>
//         </span>
//         <ul>
//             @foreach ($comment->children as $child)
//                 <li>
//                     <span style="display: flex">
//                         {{ $child->user->username }}: {{ $child->body }}
//                         <form action="/" method="POST">
//                             @csrf
//                             <input type="hidden" name="parent_id" value="{{ $child->id }}">
//                             <input name="body" placeholder="Comment body" />
//                             <button>Leave comment</button>
//                         </form>
//                     </span>
//                 </li>
//             @endforeach
//         </ul>
//     </li>
// @endforeach