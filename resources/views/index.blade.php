@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'СевЭко'])
@endsection

@section('page-content')
    <div class="page__wrapper home">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="home__intro">
                <h1 class="home__title">Веб-ориентированная система <span class="accent-color">эко</span>сообщества города Севастополя</h1>
            </div>

            <div class="text">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat excepturi consequatur amet est labore laudantium et magnam enim minus id vitae repudiandae eligendi explicabo facere iusto unde sequi, veritatis ex cupiditate aspernatur doloribus nulla nam facilis numquam! Quia cum totam tempora suscipit iste non? Tenetur delectus impedit odio neque nisi, dicta totam cupiditate ratione accusamus, provident porro? Reiciendis ex deserunt minima quibusdam vel minus iusto, laboriosam quidem sequi recusandae mollitia odit velit assumenda. Eos hic deleniti doloremque architecto earum est ipsa expedita eius facilis ad accusamus nisi delectus, perspiciatis eveniet, blanditiis atque distinctio repudiandae eligendi.</p> 
                <p>Explicabo iure iusto incidunt corporis quisquam optio, commodi totam ipsa qui alias ratione ducimus quia expedita. Vero, hic suscipit? Quisquam quis non, modi quibusdam fugiat, nemo praesentium esse iusto vero exercitationem totam nostrum? Eius pariatur expedita possimus ex nam quo, nesciunt voluptas, quaerat modi iusto totam, commodi recusandae maxime omnis provident fugit rerum laborum! Dolorem ullam quisquam qui provident molestiae atque ipsam, aperiam itaque fugit dignissimos, sapiente architecto necessitatibus beatae odit incidunt, aspernatur blanditiis aliquam temporibus.</p> 
                <p> Officiis recusandae quidem odit molestiae similique laborum quibusdam perferendis veniam facere. Saepe facilis laboriosam deleniti sunt dignissimos soluta at consectetur accusamus! Quam impedit dicta eveniet mollitia velit fuga omnis reprehenderit! Cumque ullam eos nostrum hic eum consequatur repellat nihil repellendus molestias officia velit non, facilis animi. Numquam, unde debitis. Explicabo ad necessitatibus corporis distinctio minus! Quas praesentium id eos suscipit mollitia officia quisquam impedit, nisi voluptatum non, debitis dolor, recusandae incidunt nam hic dolorem eveniet?</p> 
                <p>Maiores explicabo iure iste aspernatur facilis dolor sed odit minima. Sapiente repellendus optio atque, culpa quia perferendis aut maiores nostrum voluptatum iste praesentium recusandae in cum consectetur vitae at ea rem, vero illo impedit est quidem. Dolor neque temporibus minima consequuntur esse eius dolorem obcaecati minus nemo optio, sint cumque repellendus nobis laudantium illo.</p>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
