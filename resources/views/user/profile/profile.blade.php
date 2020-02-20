@extends('user.layout.user')
@section('title', 'Home')

@section('content')
    <div class="profile">
        <div class="container">
        <div class="row header-profile">
            <div class="col-sm-12 col-md-3">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQL_FKKfbaiL4gH6LwGlJRxwG4IBRkYjtqmj6UvlHZqEKDK4ooa"/>
            </div>
            
            <div class="col-sm-12 col-md-9">
                <div class="user-info">
                    <span>Phan Văn Đức</span>
                    <span>Hà Nội, Việt Nam</span>
                </div>
                <div class="user-diary">
                    <ul>
                        <li>
                            <a>Followers 4</a>
                        </li>
                        <li>
                            <a>Followers 5</a>
                        </li>
                        
                        <li>
                            <a>Liked</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row row-bottom">
            <div class=" col-sm-12 col-md-9 user-description">
                <p>About Duc</p>
                <p>
                Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                </p>
            </div>
            <div class=" col-sm-12 col-md-3 list-liked-book">
                <p class="list-liked-book">Books</p>
                <img src="https://www.incimages.com/uploaded_files/image/970x450/getty_883231284_200013331818843182490_335833.jpg"/>
            </div>
        </div>
    </div>
    </div>
    @endsection