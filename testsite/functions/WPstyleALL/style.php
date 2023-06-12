<?php
function my_admin_style() {
    echo '<style>
    .wp-heading-inline{
        background-color: #f6f7f7;
        display:flex !important;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem !important;
        width: 24rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem !important;
    }
    #wpwrap{
        background-color: rgb(130, 238, 197);
    }
    #addtag{
        padding:0.5rem 1rem;
        background-color: #f6f7f7;
        border-radius: 0.5rem;
    }
    table{
        border-radius: 0.5rem;
    }

    // 共通設定用
    form{
        display: flex; 
        width: 100%; 
        gap:2rem;
        flex-direction: column;
        background-color: rgb(130, 238, 197);
    }
    .main{
        display: flex; 
        width: 100%;
        gap:1rem;
    }
    .main-colmn{
        display: flex; 
        width: 100%;
        gap:1rem;
        flex-direction: column;
    }
    .col50{
        width: 50%;
    }
    .col33{
        width: 33%;
    }
    .title{
       font-size:1.3rem;
    }
    .sub-title{
        font-size: 1rem;
        margin: 0.5rem 0 0 0;
    }
    .text-area{
        width: 100%;
        height: 10rem;
        font-size: 1.1rem;
        margin: 0;
    }
    </style>'.PHP_EOL;
  }
  add_action('admin_print_styles', 'my_admin_style');
