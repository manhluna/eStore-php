<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container" style="margin-left: 5px;">
        <ul>
            <li>
                @if(!empty(Auth::user()))
                    <span>|</span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a>{{ Auth::user()->phone }}</a>
                    <span>|</span>
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <a href="{{ route('logout') }}">Đăng Xuất</a>
                    <span>|</span>
                @else
                    <span>|</span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="{{ url('user/login') }}">Đăng Nhập</a>
                    <span>|</span>
                @endif
            </li>
        </ul>
    </div>
</div>
<div class="banner">

    <p>Chính sách bảo mật</p>
    <p>Chúng tôi thực hiện nghiêm ngặt vấn đề bảo mật khách hàng và chúng tôi chỉ thu thập, lưu hồ sơ, lưu trữ, tiết lộ,
        chuyển giao và sử dụng thông tin cá nhân của Quý khách theo các điều khoản được nêu dưới đây.</p>
    <p>Bảo vệ dữ liệu là vấn đề về tín nhiệm và vì vậy việc bảo mật cho Quý khách rất quan trọng đối với chúng tôi. Do
        đó,
        chúng tôi chỉ sử dụng tên của Quý khách và các thông tin khác có liên quan đến Quý khách theo cách thức được nêu
        trong Chính sách Bảo mật này. Chúng tôi sẽ chỉ thu thập thông tin trong trường hợp cần thiết yêu cầu chúng tôi
        làm
        như vậy và chúng tôi sẽ chỉ thu thập nếu thông tin đó có liên quan đến các giao dịch của chúng tôi với Quý
        khách.</p>

    <p>Chúng tôi sẽ chỉ lưu giữ thông tin của Quý khách cho đến khi luật pháp yêu cầu hoặc phù hợp với mục đích thu thập
        thông tin.</p>

    <p>Quý khách có thể truy cập Sàn giao dịch (như được định nghĩa trong Điều khoản Sử dụng) và trình duyệt mà không
        phải
        cung cấp bất kỳ thông tin cá nhân nào. Trong quá trình truy cập vào Sàn giao dịch, Quý khách không cần tiết lộ
        danh
        tính và tại mọi thời điểm chúng tôi không thể xác định được Quý khách trừ khi Quý khách có tài khoản trên Sàn
        giao
        dịch và đăng nhập bằng tên người dùng và mật khẩu của mình.</p>

    <p><b>Lazada cam kết tuân thủ các quy định hiện hành về pháp luật Bảo vệ Dữ liệu Cá nhân.</b></p>

    <p>Nếu Quý khách có bất kỳ nhận xét, đề xuất hoặc khiếu nại, Quý khách có thể liên hệ với chúng tôi (và chuyên viên
        Bảo
        mật Dữ liệu của chúng tôi) thông qua địa chỉ www.lazada.vn/contact.</p>

    <p><b>Thu thập thông tin cá nhân</b></p>
    <p>Khi Quý khách khởi tạo một tài khoản Lazada, hoặc cung cấp cho chúng tôi thông tin cá nhân của Quý khách thông
        qua
        Sàn giao dịch, thông tin cá nhân chúng tôi thu thập có thể bao gồm:</p>

    <ul>
        <li>• Tên</li>
        <li>• Địa chỉ giao hàng</li>
        <li>• Địa chỉ email</li>
        <li>• Số liên lạc</li>
        <li>• Số điện thoại</li>
        <li>• Ngày sinh</li>
        <li>• Giới tính</li>
    </ul>

    Quý khách chỉ phải gửi cho chúng tôi, đại lý được ủy quyền của chúng tôi hoặc Sàn giao dịch, thông tin chính xác và
    không gây hiểu nhầm và Quý khách phải cập nhật thông tin và thông báo cho chúng tôi về các thay đổi (vui lòng xem
    thêm điều khoản dưới đây). Chúng tôi bảo lưu quyền yêu cầu chứng từ để xác minh thông tin do Quý khách cung cấp.

    Chúng tôi chỉ có thể thu thập thông tin cá nhân của Quý khách nếu Quý khách tự nguyện gửi thông tin cho chúng tôi.
    Nếu Quý khách chọn không gửi thông tin cá nhân của Quý khách cho chúng tôi hoặc sau đó rút lại sự chấp thuận của Quý
    khách cho việc sử dụng thông tin cá nhân của Quý khách, chúng tôi không thể cung cấp cho Quý khách các Dịch vụ của
    chúng tôi. Quý khách có thể truy cập và cập nhật thông tin cá nhân của Quý khách đã cung cấp cho chúng tôi vào bất
    cứ lúc nào như được mô tả dưới đây.

    Nếu Quý khách cung cấp thông tin cá nhân của bất kỳ bên thứ ba nào cho chúng tôi, chúng tôi có quyền cho rằng Quý
    khách đã đạt được chấp thuận cần thiết từ bên thứ ba liên quan để chia sẻ và chuyển giao thông tin cá nhân của họ
    cho chúng tôi.

    Nếu Quý khách đăng ký trên Lazada bằng tài khoản mạng xã hội, hoặc liên kết tài khoản Lazada của Quý khách với tài
    khoản mạng xã hội của Quý khách, hoặc sử dụng các tính năng truyền thông xã hội khác của Lazada, chúng tôi có thể
    truy cập vào thông tin về Quý khách đã được Quý khách tự nguyện cung cấp phù hợp theo chính sách của nhà cung cấp
    mạng xã hội và chúng tôi sẽ quản lý dữ liệu cá nhân của Quý khách mà chúng tôi đã thu thập được theo chính sách bảo
    mật của Lazada.

    Sử dụng và Tiết lộ Thông tin Cá nhân

    Thông tin cá nhân mà chúng tôi thu thập từ Quý khách sẽ được sử dụng hoặc chia sẻ với bên thứ ba (bao gồm các công
    ty liên quan, các nhà cung cấp dịch vụ bên thứ ba và bên bán thứ ba), vì một số hoặc tất cả các mục đích sau:

    • Tạo thuận lợi cho việc sử dụng Dịch vụ của Quý khách (theo định nghĩa trong Điều khoản Sử dụng) và/hoặc truy cập
    Sàn giao dịch;

    • Xử lý các đơn đặt hàng mà Quý khách đã đặt mua thông qua Sàn giao dịch, không kể sản phẩm được bán bởi Lazada hoặc
    đối tác bán hàng. Các khoản thanh toán mà Quý khách thực hiện thông qua Sàn giao dịch cho các sản phẩm, dù được bán
    bởi Lazada hay bên thứ ba, sẽ được xử lý bởi các đại lý được ủy quyền của chúng tôi;

    • Để giao hàng hóa mà Quý khách đã mua thông qua Sàn giao dịch, không kể được bán bởi Lazada hoặc đối tác bán hàng.
    Chúng tôi có thể chuyển thông tin cá nhân của Quý khách cho bên thứ ba cho việc giao hàng hóa cho Quý khách (ví dụ
    như đơn vị chuyển phát nhanh, v.v…);

    • Cập nhật cho Quý khách về thời gian giao hàng, và cho các mục đích hỗ trợ khách hàng;

    • So sánh thông tin và xác minh với bên thứ ba để đảm bảo rằng thông tin là chính xác;

    • Ngoài ra, chúng tôi sẽ sử dụng thông tin Quý khách cung cấp để quản lý tài khoản của Quý khách (nếu có) đã tạo lập
    với chúng tôi; để xác minh và thực hiện các giao dịch tài chính liên quan đến các khoản thanh toán trực tuyến của
    Quý khách; kiểm tra việc tải dữ liệu từ Sàn giao dịch; cải tiến bố cục và/hoặc nội dung của các trang bán hàng của
    Sàn giao dịch và tuỳ chỉnh cho người dùng; xác định khách truy cập trên Sàn giao dịch; tiến hành nghiên cứu về nhân
    khẩu học và hành vi của người sử dụng; cung cấp cho Quý khách các thông tin mà chúng tôi nghĩ rằng có thể hữu ích
    hoặc do Quý khách yêu cầu từ chúng tôi, bao gồm thông tin về sản phẩm và dịch vụ của người bán hoặc bên bán thứ ba,
    với điều kiện có cơ sở rằng Quý khách không phản đối việc chúng tôi liên lạc với những mục đích này;

    • Khi Quý khách đăng ký một tài khoản với Lazada hoặc cung cấp cho chúng tôi thông tin cá nhân của Quý khách thông
    qua Sàn giao dịch, chúng tôi cũng sẽ sử dụng thông tin cá nhân đó để gửi cho Quý khách các tài liệu tiếp thị và/hoặc
    quảng cáo về sản phẩm và dịch vụ của đối tác bán hàng. Quý khách có thể hủy đăng ký nhận thông tin tiếp thị bất cứ
    lúc nào bằng cách sử dụng chức năng hủy đăng ký trong các thư tiếp thị điện tử. Chúng tôi có thể sử dụng thông tin
    liên lạc của Quý khách để gửi bản tin từ chúng tôi và từ các công ty liên kết của chúng tôi; và

    • Trong trường hợp ngoại lệ, Lazada có thể bị yêu cầu tiết lộ thông tin cá nhân, chẳng hạn như khi có căn cứ cho
    rằng việc tiết lộ là cần thiết để ngăn ngừa mối đe dọa đến mạng sống hoặc sức khoẻ, hoặc vì mục đích thực thi pháp
    luật hoặc để đáp ứng các yêu cầu pháp lý và theo quy định khác.

    Lazada có thể chia sẻ thông tin cá nhân của Quý khách với các bên thứ ba và các bên liên kết của chúng tôi cho các
    mục đích nói trên, cụ thể là để hoàn thành giao dịch với Quý khách, quản lý tài khoản của Quý khách và mối quan hệ
    của chúng tôi với Quý khách, để tiếp thị và thực hiện bất kỳ yêu cầu và quy định pháp lý hoặc yêu cầu nào khác mà
    Lazada cho là cần thiết. Khi chia sẻ thông tin cá nhân của Quý khách với những đối tác nêu trên, chúng tôi cố gắng
    đảm bảo rằng các bên đó sẽ đảm bảo và giữ cho thông tin cá nhân của Quý khách khỏi việc truy cập trái phép, thu
    thập, sử dụng, tiết lộ hoặc các rủi ro tương tự và chỉ lưu giữ thông tin cá nhân của Quý khách cho đến khi nào họ
    cần thông tin cá nhân để đạt được các mục đích nói trên.

    Khi tiết lộ hoặc chuyển giao thông tin cá nhân của Quý khách cho các bên thứ ba và các bên liên kết của chúng tôi ở
    nước ngoài, Lazada sẽ thực hiện các bước để đảm bảo rằng pháp luật của nơi tiếp nhận thông tin cũng có sẵn cơ chế
    bảo vệ dữ liệu cá nhân tương đương với tiêu chuẩn bảo vệ theo quy định của pháp luật về bảo vệ dữ liệu.

    Lazada không tham gia vào việc bán thông tin cá nhân của khách hàng cho các bên thứ ba.

    Thu hồi chấp thuận

    Quý khách có thể thông báo phản đối của Quý khách đối với việc sử dụng liên tục và/hoặc tiết lộ thông tin cá nhân
    của Quý khách cho bất kỳ mục đích và theo cách thức như đã nêu ở trên bất kỳ lúc nào bằng cách liên hệ với chúng tôi
    theo địa chỉ e-mail của chúng tôi bên dưới.

    Xin lưu ý rằng nếu Quý khách phản đối việc sử dụng và/hoặc tiết lộ thông tin cá nhân của Quý khách cho các mục đích
    và theo cách thức đã nêu ở trên, tùy thuộc vào bản chất phản đối của Quý khách, chúng tôi sẽ không tiếp tục cung cấp
    các sản phẩm hoặc dịch vụ của chúng tôi cho Quý khách hoặc thực hiện bất kỳ hợp đồng nào mà chúng tôi đã giao kết
    với Quý khách. Các quyền hợp pháp và các biện pháp khắc phục của chúng tôi được bảo lưu trong trường hợp đó.

    Cập nhật thông tin cá nhân của Quý khách

    Quý khách có thể cập nhật thông tin cá nhân của mình bất cứ lúc nào bằng cách truy cập tài khoản của Quý khách trên
    Sàn giao dịch Lazada. Nếu Quý khách không có tài khoản với chúng tôi, Quý khách có thể cập nhật bằng cách liên hệ
    với chúng tôi theo địa chỉ của chúng tôi ở trên.

    Chúng tôi sẽ thực hiện các bước để chia sẻ cập nhật với thông tin cá nhân của Quý khách với các bên thứ ba và các
    chi nhánh của chúng tôi mà chúng tôi đã chia sẻ thông tin cá nhân của Quý khách nếu thông tin cá nhân của Quý khách
    vẫn cần thiết cho các mục đích nêu trên.

    Truy cập thông tin cá nhân của Quý khách

    Nếu Quý khách muốn xem thông tin cá nhân mà chúng tôi có hoặc hỏi về cách thức mà Lazada đã hoặc có thể sử dụng hoặc
    tiết lộ trong năm vừa qua, Quý khách vui lòng liên hệ với chúng tôi theo thông tin liên hệ nêu trên. Chúng tôi bảo
    lưu quyền tính phí quản lý hợp lý để lấy hồ sơ thông tin cá nhân của Quý khách.

    Nếu Quý khách có một tài khoản với Lazada, Quý khách có thể truy cập vào chi tiết đơn hàng của Quý khách bằng cách
    đăng nhập vào tài khoản của Quý khách trên Sàn giao dịch. Tại đây Quý khách có thể xem chi tiết các đơn đặt hàng của
    Quý khách đã hoàn thành, những thông tin được công khai và những thông tin được cung cấp và quản lý chi tiết về địa
    chỉ, chi tiết ngân hàng và bất kỳ thông tin nào mà Quý khách có thể đã đăng ký. Quý khách cam kết giữ bí mật tên
    người dùng, mật khẩu và các chi tiết đặt hàng của Quý khách với Lazada và không làm cho thông tin đó có sẵn trái
    phép cho các bên thứ ba. Chúng tôi không chịu bất kỳ trách nhiệm pháp lý đối với việc sử dụng sai trái tên người
    dùng Lazada, mật khẩu hoặc chi tiết yêu cầu của Quý khách, trừ khi được nêu trong Điều khoản Sử dụng.

    Bảo mật thông tin cá nhân của Quý khách

    Lazada đảm bảo rằng tất cả các thông tin được thu thập sẽ được lưu trữ an toàn và bảo đảm. Chúng tôi bảo vệ thông
    tin cá nhân của Quý khách bằng cách:

    • Hạn chế quyền truy cập thông tin cá nhân

    • Duy trì các sản phẩm công nghệ để ngăn chặn truy cập trái phép trên máy tính

    • Hủy thông tin cá nhân của Quý khách an toàn khi không còn cần thiết cho bất kỳ mục đích pháp lý hoặc kinh doanh.

    Lazada sử dụng công nghệ mã hóa 128-bit SSL (secure sockets layer- Tầng ổ bảo mật) khi xử lý các chi tiết tài chính
    của Quý khách. Mã hóa 128-bit SSL được ước tính phải mất ít nhất một nghìn tỷ năm để phá vỡ và là tiêu chuẩn ngành.

    Nếu Quý khách tin rằng bảo mật của Quý khách đã bị Lazada xâm phạm, vui lòng liên hệ với chúng tôi theo địa chỉ
    e-mail của chúng tôi bên dưới.

    Mật khẩu của Quý khách là chìa khóa cho tài khoản của Quý khách. Vui lòng sử dụng số, chữ cái và ký tự đặc biệt, và
    không chia sẻ mật khẩu Lazada của Quý khách cho cá nhân bất kỳ. Nếu Quý khách chia sẻ mật khẩu của mình với người
    khác, Quý khách sẽ chịu trách nhiệm về tất cả các hành động được thực hiện và hậu quả dưới tên tài khoản của Quý
    khách. Nếu Quý khách mất quyền kiểm soát mật khẩu của mình, Quý khách có thể mất quyền kiểm soát đáng kể thông tin
    cá nhân của Quý khách và các thông tin khác gửi cho Lazada. Quý khách cũng có thể phải chịu các hành động ràng buộc
    pháp lý đối với Quý khách. Do đó, nếu mật khẩu của Quý khách bị xâm nhập vì bất kỳ lý do nào hoặc nếu Quý khách có
    căn cứ cho rằng mật khẩu của Quý khách đã bị xâm nhập, Quý khách cần liên hệ ngay với chúng tôi và thay đổi mật khẩu
    của Quý khách. Quý khách được nhắc nhở đăng xuất khỏi tài khoản của mình và đóng trình duyệt khi kết thúc sử dụng
    máy tính dùng chung.

    Khách hàng nhỏ tuổi

    Lazada không bán sản phẩm được mua bởi trẻ em. Nếu Quý khách dưới 18 tuổi, Quý khách chỉ có thể sử dụng trang web
    của chúng tôi với sự tham gia của cha mẹ hoặc người giám hộ.

    Thu thập dữ liệu máy tính

    Lazada hoặc nhà cung cấp dịch vụ được ủy quyền của Lazada có thể sử dụng các tập tin cookie, web beacon và các công
    nghệ tương tự khác để lưu trữ thông tin để giúp Quý khách trải nghiệm tốt hơn, nhanh hơn, an toàn hơn và được cá
    nhân hóa khi Quý khách sử dụng Dịch vụ và/hoặc truy cập Sàn giao dịch.

    Khi Quý khách truy cập vào Lazada, máy chủ của công ty chúng tôi sẽ tự động ghi lại thông tin mà trình duyệt của Quý
    khách gửi bất cứ khi nào Quý khách truy cập vào trang web. Dữ liệu này có thể bao gồm:

    • Địa chỉ IP của máy tính

    • Loại trình duyệt

    • Trang web Quý khách đã truy cập trước khi Quý khách đến Sàn giao dịch của chúng tôi

    • Các trang trong Sàn giao dịch mà Quý khách truy cập

    • Thời gian dành cho các trang, mục và thông tin tìm kiếm trên Sàn giao dịch, thời gian và ngày truy cập, và thống
    kê khác.

    Thông tin này được thu thập để phân tích và đánh giá để giúp chúng tôi cải tiến trang web của chúng tôi cũng như các
    dịch vụ và sản phẩm mà chúng tôi cung cấp.

    Cookie là các tệp văn bản nhỏ (thường gồm các chữ cái và số) được đặt trong bộ nhớ trình duyệt hoặc thiết bị của Quý
    khách khi Quý khách truy cập trang web hoặc xem tin nhắn. Chúng cho phép chúng tôi nhận dạng thiết bị hoặc trình
    duyệt cụ thể và giúp chúng tôi cá nhân hóa nội dung để phù hợp với sở thích ưa thích của Quý khách nhanh hơn và để
    Dịch vụ và Sàn giao dịch của chúng tôi trở nên thuận tiện và hữu ích hơn cho Quý khách.

    Quý khách có thể quản lý và xóa cookie qua trình duyệt hoặc cài đặt thiết bị của mình. Để biết thêm thông tin về
    cách làm này, vui lòng truy cập tài liệu trợ giúp của trình duyệt hoặc thiết bị của Quý khách.

    Các tín hiệu Web (web bacon) là các hình ảnh đồ họa nhỏ có thể được đưa vào Dịch vụ và Sàn giao dịch của chúng tôi.
    Chúng cho phép chúng tôi đếm số người dùng đã xem các trang này để chúng tôi có thể hiểu rõ hơn về sở thích của Quý
    khách.

    Không gửi thư rác (spam), phần mềm gián điệp hoặc Virus

    Thư rác (Spam), phần mềm gián điệp hoặc vi-rút không được phép có trên Sàn giao dịch. Hãy thiết lập và duy trì các
    ưu tiên thông báo của Quý khách để chúng tôi gửi thông tin thông tin liên lạc cho Quý khách theo sở thích của Quý
    khách. Quý khách không được cấp phép hoặc được phép thêm người dùng khác (ngay cả người dùng đã mua một mặt hàng từ
    Quý khách) vào danh sách gửi thư của Quý khách (email hoặc thư vật lý) mà không có sự đồng ý rõ ràng của họ. Quý
    khách không được gửi bất kỳ tin nhắn nào có chứa spam, phần mềm gián điệp hoặc vi-rút thông qua Sàn giao dịch. Nếu
    Quý khách muốn báo cáo bất kỳ tin nhắn đáng ngờ, vui lòng liên hệ với chúng tôi theo thông tin liên lạc nêu trên.

    Thay đổi Chính sách Bảo mật

    Lazada sẽ thường xuyên xem xét sự đầy đủ của Chính sách Bảo mật này. Chúng tôi bảo lưu quyền sửa đổi và thay đổi
    Chính sách Bảo mật vào thời điểm bất kỳ. Mọi thay đổi đối với chính sách này sẽ được công bố trên Sàn giao dịch.

    Quyền của Lazada

    QUÝ KHÁCH THỪA NHẬN VÀ CHẤP THUẬN RẰNG LAZADA CÓ QUYỀN CÔNG BỐ THÔNG TIN CÁ NHÂN CỦA QUÝ KHÁCH CHO BẤT KỲ CƠ QUAN
    PHÁP LÝ, CƠ QUAN QUẢN LÝ NHÀ NƯỚC, CHÍNH PHỦ, CƠ QUAN THUẾ HOẶC CƠ QUAN THỰC THI PHÁP LUẬT HOẶC BẤT KỲ CƠ QUAN KHÁC
    HOẶC CÁC CHỦ SỞ HỮU CÓ THẨM QUYỀN LIÊN QUAN NẾU LAZADA CÓ CƠ SỞ HỢP LÝ ĐỂ TIN RẰNG, THÔNG TIN CÁ NHÂN CỦA QUÝ KHÁCH
    CẦN THIẾT CHO MỤC ĐÍCH ĐÁP ỨNG BẤT KỲ NGHĨA VỤ, YÊU CẦU HOẶC THỎA THUẬN, BẤT KỂ LÀ TỰ NGUYỆN HOẶC BẮT BUỘC, LÀ KẾT
    QUẢ CỦA VIỆC HỢP TÁC THEO LỆNH, ĐIỀU TRA VÀ/HOẶC YÊU CẦU VỀ BẢN CHẤT BẤT KỲ VỚI CÁC BÊN NÀY. TRONG PHẠM VI PHÁT LUẬT
    CHO PHÉP, QUÝ KHÁCH ĐỒNG Ý KHÔNG THỰC HIỆN BẤT KỲ HÀNH ĐỘNG VÀ/HOẶC TỪ BỎ BẤT KỲ QUYỀN THỰC HIỆN HÀNH ĐỘNG CHỐNG LẠI
    LAZADA LIÊN QUAN ĐẾN VIỆC CÔNG BỐ THÔNG TIN CÁ NHÂN TRONG MỌI TRƯỜNG HỢP.

    Liên hệ với Lazada

    Nếu Quý khách muốn thu hồi chấp thuận của Quý khách cho việc sử dụng thông tin cá nhân, yêu cầu truy cập và/hoặc
    chỉnh sửa thông tin cá nhân của Quý khách, có bất kỳ thắc mắc, nhận xét hoặc quan tâm nào, hoặc yêu cầu bất kỳ trợ
    giúp về các vấn đề kỹ thuật hoặc cookie, vui lòng liên hệ với chúng tôi (và chuyên viên Bảo mật Dữ liệu của chúng
    tôi) thông qua địa chỉ www.lazada.vn/contact.
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')
@yield('script')
<!-- Bootstrap Core JavaScript -->
<script src="{{ url('userlayouts/webuser/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->
<script src="{{ url('userlayouts/webuser/js/minicart.js') }}"></script>
<script>
    paypal.minicart.render();

    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 0) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('userlayouts.messages')
</body>
</html>
