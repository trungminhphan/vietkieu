
/** congdan indexes **/
db.getCollection("congdan").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** coquancongtac indexes **/
db.getCollection("coquancongtac").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** diachi indexes **/
db.getCollection("diachi").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** diendidinhcu indexes **/
db.getCollection("diendidinhcu").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** hinhthuchoctap indexes **/
db.getCollection("hinhthuchoctap").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** nganhhoc indexes **/
db.getCollection("nganhhoc").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** nganhnghe indexes **/
db.getCollection("nganhnghe").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** quocgia indexes **/
db.getCollection("quocgia").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** sessions indexes **/
db.getCollection("sessions").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tinhtranglaodong indexes **/
db.getCollection("tinhtranglaodong").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tongiao indexes **/
db.getCollection("tongiao").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** trinhdo indexes **/
db.getCollection("trinhdo").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** users indexes **/
db.getCollection("users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** congdan records **/
db.getCollection("congdan").insert({
  "_id": ObjectId("559b35c15c1e88ec07f3c2d8"),
  "code": "2",
  "cmnd": "",
  "passport": "",
  "hoten": "Nguyễn Thị Thu Thanh",
  "gioitinh": "Nữ",
  "ngaysinh": ISODate("1984-12-31T15:00:00.0Z"),
  "quoctich": [
    "543c73ca5c1e8861048b4568"
  ],
  "noisinh": [
    "5576ece4d89398ec07000029",
    "5576ecefd89398ec0700002a",
    "5576ed30d89398040800002b",
    "5576f2b4d89398f006000034",
    "",
    ""
  ],
  "noicutruhiennay": [
    "5577dc565c1e88e9048b456a",
    "",
    "",
    "",
    "",
    ""
  ],
  "id_nganhnghe": ObjectId("542387d15c1e8825048b4568"),
  "diachilamviec": [
    "5577dc565c1e88e9048b456a",
    "",
    "",
    "",
    "",
    ""
  ],
  "quatrinhdaotao": "",
  "id_tongiao": "",
  "id_trinhdo": "",
  "dienthoaiban": "",
  "didong": "",
  "fax": "",
  "email": "",
  "thongtinnguoilienhe": "",
  "id_user": ObjectId("542a00aa5c1e8890048b4568"),
  "date_post": ISODate("2015-07-07T02:24:41.383Z"),
  "kethon": [
    {
      "id_kethon": ObjectId("559b38765c1e886208f3c2d8"),
      "id_congdannuocngoai": ObjectId("559b37065c1e886008f3c2d7"),
      "ngaykethon": "",
      "date_post": ISODate("2015-07-07T02:24:54.887Z"),
      "id_user": ObjectId("542a00aa5c1e8890048b4568")
    }
  ]
});
db.getCollection("congdan").insert({
  "_id": ObjectId("559b37065c1e886008f3c2d7"),
  "code": "3",
  "cmnd": "",
  "passport": "",
  "hoten": "Lưu Bảo Kha",
  "gioitinh": "Nam",
  "ngaysinh": ISODate("1974-12-31T15:00:00.0Z"),
  "quoctich": [
    "543c73ca5c1e8861048b4568"
  ],
  "noisinh": [
    "5576ece4d89398ec07000029",
    "5576ecefd89398ec0700002a",
    "5576ed49d89398040800002d",
    "5576ef90d89398b40600002a",
    "",
    ""
  ],
  "noicutruhiennay": [
    "5577dc565c1e88e9048b456a",
    "",
    "",
    "",
    "",
    ""
  ],
  "id_nganhnghe": ObjectId("542387d15c1e8825048b4568"),
  "diachilamviec": [
    "",
    "",
    "",
    "",
    "",
    ""
  ],
  "quatrinhdaotao": "",
  "id_tongiao": "",
  "id_trinhdo": "",
  "dienthoaiban": "",
  "didong": "",
  "fax": "",
  "email": "",
  "thongtinnguoilienhe": "",
  "id_user": ObjectId("542a00aa5c1e8890048b4568"),
  "date_post": ISODate("2015-07-07T02:25:09.320Z")
});
db.getCollection("congdan").insert({
  "_id": ObjectId("559b33385c1e88ec07f3c2d7"),
  "code": "1",
  "cmnd": "",
  "passport": "",
  "hoten": "Tô Thanh Đằng",
  "gioitinh": "Nam",
  "ngaysinh": ISODate("1984-12-31T15:00:00.0Z"),
  "quoctich": [
    "543b14b65c1e8824048b456a"
  ],
  "noisinh": [
    "5576ece4d89398ec07000029",
    "5576ecefd89398ec0700002a",
    "5576ed30d89398040800002b",
    "5576f2b4d89398f006000034",
    "",
    ""
  ],
  "noicutruhiennay": [
    "5577a8a55c1e888208b517ba",
    "",
    "",
    "",
    "",
    ""
  ],
  "id_nganhnghe": "",
  "diachilamviec": [
    "5577a8a55c1e888208b517ba",
    "5577a8b75c1e885508b517b9",
    "",
    "",
    "",
    ""
  ],
  "quatrinhdaotao": "",
  "id_tongiao": "",
  "id_trinhdo": "",
  "dienthoaiban": "",
  "didong": "",
  "fax": "",
  "email": "",
  "thongtinnguoilienhe": "",
  "id_user": ObjectId("542a00aa5c1e8890048b4568"),
  "date_post": ISODate("2015-07-07T02:59:12.143Z"),
  "laodong": [
    {
      "id_laodong": ObjectId("559b34375c1e886208f3c2d7"),
      "id_quocgia": ObjectId("53eb29d0f777dcd40c000390"),
      "thoigianbatdau": ISODate("2009-12-31T15:00:00.0Z"),
      "thoigianketthuc": "",
      "id_nganhnghe": ObjectId("543c76715c1e8826048b456c"),
      "id_tinhtranglaodong": ObjectId("5577e3395c1e88e9048b456c"),
      "coquanlaodong": "",
      "diachicoquanlaodong": "",
      "date_post": ISODate("2015-07-07T02:06:47.857Z"),
      "id_user": ObjectId("542a00aa5c1e8890048b4568")
    },
    {
      "id_laodong": ObjectId("559b40a95c1e88e507f3c2d8"),
      "id_quocgia": ObjectId("542a5bfb5c1e8892048b456b"),
      "thoigianbatdau": ISODate("1982-11-09T15:00:00.0Z"),
      "thoigianketthuc": ISODate("1992-10-09T15:00:00.0Z"),
      "id_nganhnghe": ObjectId("54389f895c1e8871048b4591"),
      "id_tinhtranglaodong": ObjectId("5577e30f5c1e88ed048b456a"),
      "coquanlaodong": "",
      "diachicoquanlaodong": "ABC dEdasfjhkdjhkjzsh",
      "date_post": ISODate("2015-07-07T02:59:53.74Z"),
      "id_user": ObjectId("542a00aa5c1e8890048b4568")
    }
  ]
});

/** coquancongtac records **/
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("53eb235df777dcd40c000384"),
  "ten": "Sở Ngoại vụ tỉnh An Giang",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("53eb2350f777dcd40c004657"),
  "ten": "Sở Nội vụ tỉnh An Giang",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54067919f777dcf407005789"),
  "ten": "Trường Đại học An Giang",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5440e07f5c1e887c058b4577"),
  "ten": "Tổ Chức Phi Chính Phủ"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5445b00c5c1e886d048b457b"),
  "ten": "Trường Đại Học Y Tp. Anger"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5448550a5c1e8857048b456f"),
  "ten": "Ủy Ban Nhân Dân Xã",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544ca8475c1e8828048b45de"),
  "ten": "Xuất Nhập Khẩu Nông Sản Tp Hcm"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544cab795c1e887b048b45e0"),
  "ten": "Petronas, Tp Hcm",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544dbd535c1e88fd078b4571"),
  "ten": "Đại Học Cần Thơ",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544e01485c1e882c058b4575"),
  "ten": "Phòng Lao Động Thương Binh Xã Hội"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544e49545c1e881e058b459b"),
  "ten": "Bệnh Viên Đa Khoa Châu Đốc",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544e76385c1e8828058b45df"),
  "ten": "Không Biết"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5450448c5c1e88fb058b4585"),
  "ten": "Bệnh Viện 115 Tp. Hồ Chí Minh",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545505255c1e884b098b458b"),
  "ten": "Công Ty Hyosungung"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455b79e5c1e88280d76a4ac"),
  "ten": "Melborne Victory"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d6805c1e88070d76a4b7"),
  "ten": "Nhà Hàng Quốc Tế Úc",
  "loaicoquan": "Doanh nghiệp Nước ngoài"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d75c5c1e88230d76a4c1"),
  "ten": "Công Ty T N H H  định Thành",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d7d75c1e88260d76a4be"),
  "ten": "Ngân Hàng Á Châu",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d8995c1e88230d76a4c9"),
  "ten": "Viện Lúa Đồng Bằng Sông Cửu Long",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d9b05c1e88230d76a4d1"),
  "ten": "Học Viện Presh",
  "loaicoquan": "Doanh nghiệp Nước ngoài"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54573b665c1e88230d76a5ea"),
  "ten": "Hội Nhiếp Ảnh An Giang",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545875385c1e88651776a4e2"),
  "ten": "Công Ty Hiển Nga",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545a432e5c1e885f2e76a4d9"),
  "ten": "Hội Thánh Tin Lành Long Xuyên",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545ab7e25c1e88432f76a4a7"),
  "ten": "Trường Học Sydney",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545af0605c1e885e2e76a555"),
  "ten": "Trung Tâm Bóng Đá An Giang",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545f391f5c1e88fa148b45c5"),
  "ten": "Ngân Hàng Quốc Tế Tp. Hồ Chí Minh",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("546315155c1e88cc25d3d5a4"),
  "ten": "Đại Học Ngân Hàng Tp. Hồ Chí Minh",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5464b92e5c1e88dd068b45ac"),
  "ten": "Bảo Hiểm Xã Hội An Giang",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5464bc095c1e88d2068b45a1"),
  "ten": "Trung Ương Đoàn",
  "loaicoquan": "Nhà Nước"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545ab7875c1e88912e76a4db"),
  "ten": "Công Ty Insight Asia",
  "loaicoquan": "Doanh nghiệp Nước ngoài"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54573d5a5c1e88441276a508"),
  "ten": "Minnesota",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("5455d9075c1e88230d76a4cd"),
  "ten": "Công Ty Fpt",
  "loaicoquan": "Tư nhân"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("545505035c1e884f098b457c"),
  "ten": "Công Ty Toyota",
  "loaicoquan": "Doanh nghiệp Nước ngoài"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("544ca8b85c1e882b048b45e8"),
  "ten": "Công Ty Nyk",
  "loaicoquan": "Doanh nghiệp Nước ngoài"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b456a"),
  "ten": "Văn Phòng Ủy Ban Nhân Dân Tỉnh An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4570"),
  "ten": "Văn phòng \nTỉnh ủy",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4575"),
  "ten": "Trường Đại Học An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46e9"),
  "ten": "Trung tâm XTTM&ĐT tỉnh",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46ee"),
  "ten": "Tỉnh đoàn",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46f3"),
  "ten": "Sở Y Tế An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b470c"),
  "ten": "Sở Xây Dựng An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4714"),
  "ten": "Sở Tư Pháp An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4718"),
  "ten": "Sở Tài Nguyên Môi Trường An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4721"),
  "ten": "Sở Ngoại Vụ An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b472d"),
  "ten": "Sở Nội Vụ An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4732"),
  "ten": "Sở Nông Nghiệp Và Phát Triển Nông Thôn An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4752"),
  "ten": "Sở Kế Hoạch Đầu Tư An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b475a"),
  "ten": "Sở Gd&đt An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b476a"),
  "ten": "Hội Lhpn Tỉnh An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b476f"),
  "ten": "Sở Vhtt&dl An Giang",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54ceedb35c1e8897195e44f2"),
  "ten": "Thành Phố Hồ Chí Minh",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54d0879b5c1e881e265e44f1"),
  "ten": "Atea Environmental Tech (malaysia) Sdn. Bhd",
  "loaicoquan": "Khác"
});
db.getCollection("coquancongtac").insert({
  "_id": ObjectId("54dc5f115c1e881b0d8b456a"),
  "ten": "Không",
  "loaicoquan": "Khác"
});

/** diachi records **/
db.getCollection("diachi").insert({
  "_id": ObjectId("5577a8a55c1e888208b517ba"),
  "tendiachi": "Campuchia",
  "level2": [
    {
      "_id": ObjectId("5577a8b75c1e885508b517b9"),
      "tendiachi": "Tỉnh Kandal"
    },
    {
      "_id": ObjectId("5577a8dd5c1e880f08b517bb"),
      "tendiachi": "Tỉnh Takeo"
    }
  ]
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc305c1e88ed048b4567"),
  "tendiachi": "Malaysia"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc3c5c1e88c8068b4568"),
  "tendiachi": "Indonesia"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc485c1e8897068b4567"),
  "tendiachi": "Singapore"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc505c1e88ec048b4567"),
  "tendiachi": "Canada"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc565c1e88e9048b456a"),
  "tendiachi": "Mỹ"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc5b5c1e88ed048b4568"),
  "tendiachi": "Đài Loan"
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5577dc6c5c1e88c8068b4569"),
  "tendiachi": "Úc",
  "level2": [
    {
      "_id": ObjectId("5577dca05c1e8897068b4568"),
      "tendiachi": "Bang Canberra"
    }
  ]
});
db.getCollection("diachi").insert({
  "_id": ObjectId("5576ece4d89398ec07000029"),
  "tendiachi": "Việt Nam",
  "level2": [
    {
      "_id": ObjectId("5576ecefd89398ec0700002a"),
      "tendiachi": "Tỉnh An Giang",
      "level3": [
        {
          "_id": ObjectId("5576ed1fd89398040800002a"),
          "tendiachi": "Thành Phố Long Xuyên",
          "level4": [
            {
              "_id": ObjectId("5576ee26d89398ec07000031"),
              "tendiachi": "Phường Mỹ Long"
            },
            {
              "_id": ObjectId("5576ee2fd89398f006000029"),
              "tendiachi": "Phường Mỹ Quý"
            },
            {
              "_id": ObjectId("5576ee36d89398f00600002a"),
              "tendiachi": "Phường Mỹ Phước"
            },
            {
              "_id": ObjectId("5576f324d89398b40600005f"),
              "tendiachi": "Phường Bình Khánh"
            },
            {
              "_id": ObjectId("5576f337d89398f006000037"),
              "tendiachi": "Phường Bình Đức"
            },
            {
              "_id": ObjectId("5576f33fd89398b406000060"),
              "tendiachi": "Phường Mỹ Bình"
            },
            {
              "_id": ObjectId("5576f34ad89398b406000061"),
              "tendiachi": "Phường Mỹ Hòa"
            },
            {
              "_id": ObjectId("5576f36bd89398b406000062"),
              "tendiachi": "Phường Mỹ Thạnh"
            },
            {
              "_id": ObjectId("5576f375d89398b406000063"),
              "tendiachi": "Phường Mỹ Thới"
            },
            {
              "_id": ObjectId("5576f37cd89398b406000064"),
              "tendiachi": "Phường Mỹ Xuyên"
            },
            {
              "_id": ObjectId("5576f384d89398b406000065"),
              "tendiachi": "Phường Đông Xuyên"
            },
            {
              "_id": ObjectId("5576f38bd89398b406000066"),
              "tendiachi": "Xã Mỹ Hòa Hưng"
            },
            {
              "_id": ObjectId("5576f392d89398b406000067"),
              "tendiachi": "Xã Mỹ Khánh"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed30d89398040800002b"),
          "tendiachi": "Thành Phố Châu Đốc",
          "level4": [
            {
              "_id": ObjectId("5576f2b4d89398f006000034"),
              "tendiachi": "Phường Châu Phú A",
              "level5": [
                {
                  "_id": ObjectId("5577ddf95c1e8897068b4569"),
                  "tendiachi": "Vĩnh Phú"
                }
              ]
            },
            {
              "_id": ObjectId("5576f2bbd89398f006000035"),
              "tendiachi": "Phường Châu Phú B"
            },
            {
              "_id": ObjectId("5576f2bfd89398f006000036"),
              "tendiachi": "Phường Núi Sam"
            },
            {
              "_id": ObjectId("5576f2c5d89398b40600005b"),
              "tendiachi": "Phường Vĩnh Mỹ"
            },
            {
              "_id": ObjectId("5576f2ccd89398b40600005c"),
              "tendiachi": "Phường Vĩnh Nguơn"
            },
            {
              "_id": ObjectId("5576f2d1d89398b40600005d"),
              "tendiachi": "Xã Vĩnh Châu"
            },
            {
              "_id": ObjectId("5576f2d8d89398b40600005e"),
              "tendiachi": "Xã Vĩnh Tế"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed3ad89398040800002c"),
          "tendiachi": "Huyện Châu Thành",
          "level4": [
            {
              "_id": ObjectId("5576ef84d89398ec07000037"),
              "tendiachi": "Thị Trấn An Châu",
              "level5": [
                
              ]
            },
            {
              "_id": ObjectId("5576ef8bd89398b406000029"),
              "tendiachi": "Xã An Hòa"
            },
            {
              "_id": ObjectId("5576ef90d89398b40600002a"),
              "tendiachi": "Xã Bình Hòa"
            },
            {
              "_id": ObjectId("5576ef96d89398b40600002b"),
              "tendiachi": "Xã Bình Thạnh"
            },
            {
              "_id": ObjectId("5576ef9fd89398b40600002c"),
              "tendiachi": "Xã Cần Đăng"
            },
            {
              "_id": ObjectId("5576efa6d89398b40600002d"),
              "tendiachi": "Xã Hòa Bình Thạnh"
            },
            {
              "_id": ObjectId("5576efacd89398b40600002e"),
              "tendiachi": "Xã Tân Phú"
            },
            {
              "_id": ObjectId("5576efb2d89398b40600002f"),
              "tendiachi": "Xã Vĩnh An"
            },
            {
              "_id": ObjectId("5576efbcd89398b406000030"),
              "tendiachi": "Xã Vĩnh Bình"
            },
            {
              "_id": ObjectId("5576efc3d89398b406000031"),
              "tendiachi": "Xã Vĩnh Hanh"
            },
            {
              "_id": ObjectId("5576efcbd89398b406000032"),
              "tendiachi": "Xã Vĩnh Lợi"
            },
            {
              "_id": ObjectId("5576efd1d89398ec07000038"),
              "tendiachi": "Xã Vĩnh Nhuận"
            },
            {
              "_id": ObjectId("5576efd7d89398ec07000039"),
              "tendiachi": "Xã Vĩnh Thành"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed49d89398040800002d"),
          "tendiachi": "Huyện Châu Phú",
          "level4": [
            {
              "_id": ObjectId("5576ef19d893980408000031"),
              "tendiachi": "Thị Trấn Cái Dầu",
              "level5": [
                {
                  "_id": ObjectId("5576f727d89398f006000054"),
                  "tendiachi": "Ấp Bình Hòa"
                },
                {
                  "_id": ObjectId("5576f72cd89398f006000055"),
                  "tendiachi": "Ấp Bình Nghĩa"
                },
                {
                  "_id": ObjectId("5576f732d89398b40600008e"),
                  "tendiachi": "Ấp Vĩnh Lộc"
                },
                {
                  "_id": ObjectId("5576f737d89398b40600008f"),
                  "tendiachi": "Ấp Vĩnh Phúc"
                },
                {
                  "_id": ObjectId("5576f73dd89398b406000090"),
                  "tendiachi": "Ấp Vĩnh Thành"
                },
                {
                  "_id": ObjectId("5576f743d89398b406000091"),
                  "tendiachi": "Ấp Vĩnh Tiến"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef20d89398ec07000033"),
              "tendiachi": "Xã Bình Chánh",
              "level5": [
                {
                  "_id": ObjectId("5576f752d89398b406000092"),
                  "tendiachi": "Ấp Bình Chơn"
                },
                {
                  "_id": ObjectId("5576f759d89398b406000093"),
                  "tendiachi": "Ấp Bình Lợi"
                },
                {
                  "_id": ObjectId("5576f75ed89398b406000094"),
                  "tendiachi": "Ấp Bình Phước"
                },
                {
                  "_id": ObjectId("5576f765d89398b406000095"),
                  "tendiachi": "Ấp Bình Thạnh"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef26d89398ec07000034"),
              "tendiachi": "Xã Bình Long",
              "level5": [
                {
                  "_id": ObjectId("5576f773d89398b406000096"),
                  "tendiachi": "Ấp Bình Chánh"
                },
                {
                  "_id": ObjectId("5576f77ad89398f006000056"),
                  "tendiachi": "Ấp Bình Châu"
                },
                {
                  "_id": ObjectId("5576f782d89398b406000097"),
                  "tendiachi": "Ấp Bình Hưng"
                },
                {
                  "_id": ObjectId("5576f787d89398f006000057"),
                  "tendiachi": "Ấp Chánh Hưng"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef2ed89398ec07000035"),
              "tendiachi": "Xã Bình Mỹ",
              "level5": [
                {
                  "_id": ObjectId("5576f797d89398f006000058"),
                  "tendiachi": "Ấp Bình Chánh 1"
                },
                {
                  "_id": ObjectId("5576f79cd89398b406000098"),
                  "tendiachi": "Ấp Bình Chánh 2"
                },
                {
                  "_id": ObjectId("5576f7a4d89398b406000099"),
                  "tendiachi": "Ấp Bình Hưng 1"
                },
                {
                  "_id": ObjectId("5576f7a9d89398b40600009a"),
                  "tendiachi": "Ấp Bình Hưng 2"
                },
                {
                  "_id": ObjectId("5576f7afd89398b40600009b"),
                  "tendiachi": "Ấp Bình Minh"
                },
                {
                  "_id": ObjectId("5576f7b4d89398b40600009c"),
                  "tendiachi": "Ấp Bình Thành"
                },
                {
                  "_id": ObjectId("5576f7bbd89398b40600009d"),
                  "tendiachi": "Ấp Bình Trung"
                },
                {
                  "_id": ObjectId("5576f7c1d89398b40600009e"),
                  "tendiachi": "Ấp Bình Tân"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef34d89398ec07000036"),
              "tendiachi": "Xã Bình Phú",
              "level5": [
                {
                  "_id": ObjectId("5576f7e1d89398b40600009f"),
                  "tendiachi": "Ấp Bình An"
                },
                {
                  "_id": ObjectId("5576f7e6d89398b4060000a0"),
                  "tendiachi": "Ấp Bình Khánh"
                },
                {
                  "_id": ObjectId("5576f7ebd89398b4060000a1"),
                  "tendiachi": "Ấp Bình Quới"
                },
                {
                  "_id": ObjectId("5576f7f0d89398b4060000a2"),
                  "tendiachi": "Ấp Bình Thới"
                },
                {
                  "_id": ObjectId("5576f7f6d89398b4060000a3"),
                  "tendiachi": "Ấp Bình Tây"
                },
                {
                  "_id": ObjectId("5576f7fcd89398b4060000a4"),
                  "tendiachi": "Ấp Bình Điền"
                },
                {
                  "_id": ObjectId("5576f803d89398b4060000a5"),
                  "tendiachi": "Ấp Bình Đức"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef39d893980c07000035"),
              "tendiachi": "Xã Bình Thủy",
              "level5": [
                {
                  "_id": ObjectId("5576f819d89398b4060000a6"),
                  "tendiachi": "Ấp Bình Hòa"
                },
                {
                  "_id": ObjectId("5576f81ed89398b4060000a7"),
                  "tendiachi": "Ấp Bình Thiện"
                },
                {
                  "_id": ObjectId("5576f823d89398b4060000a8"),
                  "tendiachi": "Ấp Bình Thới"
                },
                {
                  "_id": ObjectId("5576f82ad89398b4060000a9"),
                  "tendiachi": "Ấp Bình Yên"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef3fd893980c07000036"),
              "tendiachi": "Xã Khánh Hòa",
              "level5": [
                {
                  "_id": ObjectId("5576f838d89398b4060000aa"),
                  "tendiachi": "Ấp Khánh An"
                },
                {
                  "_id": ObjectId("5576f83dd89398b4060000ab"),
                  "tendiachi": "Ấp Khánh Bình"
                },
                {
                  "_id": ObjectId("5576f842d89398b4060000ac"),
                  "tendiachi": "Ấp Khánh Châu"
                },
                {
                  "_id": ObjectId("5576f849d89398b4060000ad"),
                  "tendiachi": "Ấp Khánh Hòa"
                },
                {
                  "_id": ObjectId("5576f84fd89398b4060000ae"),
                  "tendiachi": "Ấp Khánh Lợi"
                },
                {
                  "_id": ObjectId("5576f855d89398b4060000af"),
                  "tendiachi": "Ấp Khánh Mỹ"
                },
                {
                  "_id": ObjectId("5576f85bd89398b4060000b0"),
                  "tendiachi": "Ấp Khánh Phát"
                },
                {
                  "_id": ObjectId("5576f862d89398b4060000b1"),
                  "tendiachi": "Ấp Khánh Thuận"
                },
                {
                  "_id": ObjectId("5576f867d89398b4060000b2"),
                  "tendiachi": "Ấp Khánh Đức"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef4ed893980c07000037"),
              "tendiachi": "Xã Mỹ Phú",
              "level5": [
                {
                  "_id": ObjectId("5576f882d89398b4060000b3"),
                  "tendiachi": "Ấp Mỹ An"
                },
                {
                  "_id": ObjectId("5576f888d89398b4060000b4"),
                  "tendiachi": "Ấp Mỹ Hưng"
                },
                {
                  "_id": ObjectId("5576f88fd89398b4060000b5"),
                  "tendiachi": "Ấp Mỹ Lợi"
                },
                {
                  "_id": ObjectId("5576f89bd89398b4060000b6"),
                  "tendiachi": "Ấp Mỹ Phước"
                },
                {
                  "_id": ObjectId("5576f8a1d89398b4060000b7"),
                  "tendiachi": "Ấp Mỹ Quý"
                },
                {
                  "_id": ObjectId("5576f8a8d89398b4060000b8"),
                  "tendiachi": "Ấp Mỹ Thuận"
                },
                {
                  "_id": ObjectId("5576f8b1d89398b4060000b9"),
                  "tendiachi": "Ấp Mỹ Trung"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef53d893980c07000038"),
              "tendiachi": "Xã Mỹ Đức",
              "level5": [
                {
                  "_id": ObjectId("5576f8c5d89398b4060000ba"),
                  "tendiachi": "Ấp Mỹ Chánh"
                },
                {
                  "_id": ObjectId("5576f8ccd89398b4060000bb"),
                  "tendiachi": "Ấp Mỹ Hiệp"
                },
                {
                  "_id": ObjectId("5576f8d2d89398b4060000bc"),
                  "tendiachi": "Ấp Mỹ Hòa"
                },
                {
                  "_id": ObjectId("5576f8d9d89398b4060000bd"),
                  "tendiachi": "Ấp Mỹ Hưng"
                },
                {
                  "_id": ObjectId("5576f8dfd89398b4060000be"),
                  "tendiachi": "Ấp Mỹ Phó"
                },
                {
                  "_id": ObjectId("5576f8e6d89398b4060000bf"),
                  "tendiachi": "Ấp Mỹ Thiện"
                },
                {
                  "_id": ObjectId("5576f8ecd89398b4060000c0"),
                  "tendiachi": "Ấp Mỹ Thành"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef59d893980c07000039"),
              "tendiachi": "Xã Thạnh Mỹ Tây",
              "level5": [
                {
                  "_id": ObjectId("5576f8fbd89398b4060000c1"),
                  "tendiachi": "Ấp Ba Xưa"
                },
                {
                  "_id": ObjectId("5576f901d89398b4060000c2"),
                  "tendiachi": "Ấp Bờ Dâu"
                },
                {
                  "_id": ObjectId("5576f906d89398b4060000c3"),
                  "tendiachi": "Ấp Long Châu"
                },
                {
                  "_id": ObjectId("5576f90bd89398b4060000c4"),
                  "tendiachi": "Ấp Mỹ Bình"
                },
                {
                  "_id": ObjectId("5576f914d89398b4060000c5"),
                  "tendiachi": "Ấp Thạnh Hòa"
                },
                {
                  "_id": ObjectId("5576f91ad89398f006000059"),
                  "tendiachi": "Ấp Thạnh Phú"
                },
                {
                  "_id": ObjectId("5576f91fd89398f00600005a"),
                  "tendiachi": "Ấp Tây An"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef60d893980c0700003a"),
              "tendiachi": "Xã Vĩnh Thạnh Trung",
              "level5": [
                {
                  "_id": ObjectId("5576f930d89398f00600005b"),
                  "tendiachi": "Ấp Bình An"
                },
                {
                  "_id": ObjectId("5576f936d89398f00600005c"),
                  "tendiachi": "Ấp Thạnh An"
                },
                {
                  "_id": ObjectId("5576f93fd89398f00600005d"),
                  "tendiachi": "Ấp Thạnh Lợi"
                },
                {
                  "_id": ObjectId("5576f944d89398f00600005e"),
                  "tendiachi": "Ấp Vĩnh An"
                },
                {
                  "_id": ObjectId("5576f94dd89398f00600005f"),
                  "tendiachi": "Ấp Vĩnh Bình"
                },
                {
                  "_id": ObjectId("5576f955d89398f006000060"),
                  "tendiachi": "Ấp Vĩnh Hòa"
                },
                {
                  "_id": ObjectId("5576f95bd89398b4060000c6"),
                  "tendiachi": "Ấp Vĩnh Hưng"
                },
                {
                  "_id": ObjectId("5576f961d89398b4060000c7"),
                  "tendiachi": "Ấp Vĩnh Lợi"
                },
                {
                  "_id": ObjectId("5576f967d89398b4060000c8"),
                  "tendiachi": "Ấp Vĩnh Phú"
                },
                {
                  "_id": ObjectId("5576f96cd89398f006000061"),
                  "tendiachi": "Ấp Vĩnh Quý"
                },
                {
                  "_id": ObjectId("5576f971d89398b4060000c9"),
                  "tendiachi": "Ấp Vĩnh Quới"
                },
                {
                  "_id": ObjectId("5576f978d89398f006000062"),
                  "tendiachi": "Ấp Vĩnh Thuận"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef67d893980c0700003b"),
              "tendiachi": "Xã Ô Long Vỹ",
              "level5": [
                {
                  "_id": ObjectId("5576f98bd89398b4060000ca"),
                  "tendiachi": "Ấp Long An"
                },
                {
                  "_id": ObjectId("5576f991d89398b4060000cb"),
                  "tendiachi": "Ấp Long Bình"
                },
                {
                  "_id": ObjectId("5576f998d89398f006000063"),
                  "tendiachi": "Ấp Long Hòa"
                },
                {
                  "_id": ObjectId("5576f99fd89398f006000064"),
                  "tendiachi": "Ấp Long Hưng"
                },
                {
                  "_id": ObjectId("5576f9a6d89398f006000065"),
                  "tendiachi": "Ấp Long Phước"
                },
                {
                  "_id": ObjectId("5576f9add89398f006000066"),
                  "tendiachi": "Ấp Long Định"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef6dd893980c0700003c"),
              "tendiachi": "Xã Đào Hữu Cảnh",
              "level5": [
                {
                  "_id": ObjectId("5576f9bad89398b4060000cc"),
                  "tendiachi": "Ấp Hưng Hòa"
                },
                {
                  "_id": ObjectId("5576f9c0d89398b4060000cd"),
                  "tendiachi": "Ấp Hưng Lợi"
                },
                {
                  "_id": ObjectId("5576f9c8d89398f006000067"),
                  "tendiachi": "Ấp Hưng Phát"
                },
                {
                  "_id": ObjectId("5576f9cfd89398f006000068"),
                  "tendiachi": "Ấp Hưng Phú"
                },
                {
                  "_id": ObjectId("5576f9d6d89398f006000069"),
                  "tendiachi": "Ấp Hưng Thuận"
                },
                {
                  "_id": ObjectId("5576f9dcd89398f00600006a"),
                  "tendiachi": "Ấp Hưng Thạnh"
                },
                {
                  "_id": ObjectId("5576f9e2d89398f00600006b"),
                  "tendiachi": "Ấp Hưng Thới"
                },
                {
                  "_id": ObjectId("5576f9ebd89398b4060000ce"),
                  "tendiachi": "Ấp Hưng Trung"
                }
              ]
            },
            {
              "_id": ObjectId("559b37af5c1e886108f3c2d7"),
              "tendiachi": "Xã Bình Hòa"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed53d89398040800002e"),
          "tendiachi": "Thị Xã Tân Châu",
          "level4": [
            {
              "_id": ObjectId("5576f3bbd89398b406000068"),
              "tendiachi": "Phường Long Châu"
            },
            {
              "_id": ObjectId("5576f3c1d89398b406000069"),
              "tendiachi": "Phường Long Hưng"
            },
            {
              "_id": ObjectId("5576f3c7d89398b40600006a"),
              "tendiachi": "Phường Long Phú"
            },
            {
              "_id": ObjectId("5576f3ccd89398b40600006b"),
              "tendiachi": "Phường Long Sơn"
            },
            {
              "_id": ObjectId("5576f3d1d89398b40600006c"),
              "tendiachi": "Phường Long Thạnh"
            },
            {
              "_id": ObjectId("5576f3d6d89398b40600006d"),
              "tendiachi": "Xã Châu Phong"
            },
            {
              "_id": ObjectId("5576f3dbd89398b40600006e"),
              "tendiachi": "Xã Long An"
            },
            {
              "_id": ObjectId("5576f3e3d89398b40600006f"),
              "tendiachi": "Xã Lê Chánh"
            },
            {
              "_id": ObjectId("5576f3eed89398f006000038"),
              "tendiachi": "Xã Phú Lộc"
            },
            {
              "_id": ObjectId("5576f3f6d89398f006000039"),
              "tendiachi": "Xã Phú Vĩnh"
            },
            {
              "_id": ObjectId("5576f3ffd89398f00600003a"),
              "tendiachi": "Xã Tân An"
            },
            {
              "_id": ObjectId("5576f40cd89398f00600003b"),
              "tendiachi": "Xã Tân Thạnh"
            },
            {
              "_id": ObjectId("5576f414d89398f00600003c"),
              "tendiachi": "Xã Vĩnh Hòa"
            },
            {
              "_id": ObjectId("5576f419d89398b406000070"),
              "tendiachi": "Xã Vĩnh Xương"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed58d89398ec0700002c"),
          "tendiachi": "Huyện Thoại Sơn",
          "level4": [
            {
              "_id": ObjectId("5576f12ad89398ec07000050"),
              "tendiachi": "Thị Trấn Núi Sập"
            },
            {
              "_id": ObjectId("5576f130d89398b406000041"),
              "tendiachi": "Thị Trấn Phú Hòa"
            },
            {
              "_id": ObjectId("5576f137d89398b406000042"),
              "tendiachi": "Thị Trấn Óc Eo"
            },
            {
              "_id": ObjectId("5576f13ed89398b406000043"),
              "tendiachi": "Xã An Bình"
            },
            {
              "_id": ObjectId("5576f146d89398b406000044"),
              "tendiachi": "Xã Bình Thành"
            },
            {
              "_id": ObjectId("5576f14cd89398b406000045"),
              "tendiachi": "Xã Mỹ Phú Đông"
            },
            {
              "_id": ObjectId("5576f153d89398b406000046"),
              "tendiachi": "Xã Phú Thuận"
            },
            {
              "_id": ObjectId("5576f15ad89398b406000047"),
              "tendiachi": "Xã Thoại Giang"
            },
            {
              "_id": ObjectId("5576f161d89398b406000048"),
              "tendiachi": "Xã Tây Phú"
            },
            {
              "_id": ObjectId("5576f167d89398ec07000051"),
              "tendiachi": "Xã Vĩnh Chánh"
            },
            {
              "_id": ObjectId("5576f16cd89398ec07000052"),
              "tendiachi": "Xã Vĩnh Khánh"
            },
            {
              "_id": ObjectId("5576f173d89398ec07000053"),
              "tendiachi": "Xã Vĩnh Phú"
            },
            {
              "_id": ObjectId("5576f179d89398b406000049"),
              "tendiachi": "Xã Vĩnh Trạch"
            },
            {
              "_id": ObjectId("5576f17fd89398b40600004a"),
              "tendiachi": "Xã Vọng Thê"
            },
            {
              "_id": ObjectId("5576f185d89398b40600004b"),
              "tendiachi": "Xã Vọng Đông"
            },
            {
              "_id": ObjectId("5576f18bd89398b40600004c"),
              "tendiachi": "Xã Định Mỹ"
            },
            {
              "_id": ObjectId("5576f191d89398b40600004d"),
              "tendiachi": "Xã Định Thành"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed62d89398ec0700002d"),
          "tendiachi": "Huyện Tịnh Biên",
          "level4": [
            {
              "_id": ObjectId("5576f22cd89398b406000057"),
              "tendiachi": "Thị Trấn Chi Lăng"
            },
            {
              "_id": ObjectId("5576f234d89398b406000058"),
              "tendiachi": "Thị Trấn Nhà Bàng"
            },
            {
              "_id": ObjectId("5576f23ad89398b406000059"),
              "tendiachi": "Thị Trấn Tịnh Biên"
            },
            {
              "_id": ObjectId("5576f242d89398ec0700005a"),
              "tendiachi": "Xã An Cư"
            },
            {
              "_id": ObjectId("5576f249d89398ec0700005b"),
              "tendiachi": "Xã An Hảo"
            },
            {
              "_id": ObjectId("5576f256d89398f00600002c"),
              "tendiachi": "Xã An Nông"
            },
            {
              "_id": ObjectId("5576f277d89398f00600002d"),
              "tendiachi": "Xã An Phú"
            },
            {
              "_id": ObjectId("5576f27ed89398f00600002e"),
              "tendiachi": "Xã Nhơn Hưng"
            },
            {
              "_id": ObjectId("5576f284d89398f00600002f"),
              "tendiachi": "Xã Núi Voi"
            },
            {
              "_id": ObjectId("5576f28ad89398b40600005a"),
              "tendiachi": "Xã Thới Sơn"
            },
            {
              "_id": ObjectId("5576f290d89398f006000030"),
              "tendiachi": "Xã Tân Lập"
            },
            {
              "_id": ObjectId("5576f296d89398f006000031"),
              "tendiachi": "Xã Tân Lợi"
            },
            {
              "_id": ObjectId("5576f29bd89398f006000032"),
              "tendiachi": "Xã Văn Giáo"
            },
            {
              "_id": ObjectId("5576f2a0d89398f006000033"),
              "tendiachi": "Xã Vĩnh Trung"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed66d89398ec0700002e"),
          "tendiachi": "Huyện Tri Tôn",
          "level4": [
            {
              "_id": ObjectId("5576f1a9d89398b40600004e"),
              "tendiachi": "Thị Trấn Ba Chúc"
            },
            {
              "_id": ObjectId("5576f1b1d89398b40600004f"),
              "tendiachi": "Thị Trấn Tri Tôn"
            },
            {
              "_id": ObjectId("5576f1b9d89398ec07000054"),
              "tendiachi": "Xã An Tức"
            },
            {
              "_id": ObjectId("5576f1bed89398ec07000055"),
              "tendiachi": "Xã Châu Lăng"
            },
            {
              "_id": ObjectId("5576f1c4d89398ec07000056"),
              "tendiachi": "Xã Cô Tô"
            },
            {
              "_id": ObjectId("5576f1cad89398ec07000057"),
              "tendiachi": "Xã Lê Trì"
            },
            {
              "_id": ObjectId("5576f1d3d89398ec07000058"),
              "tendiachi": "Xã Lương An Trà"
            },
            {
              "_id": ObjectId("5576f1dad89398ec07000059"),
              "tendiachi": "Xã Lương Phi"
            },
            {
              "_id": ObjectId("5576f1e2d89398b406000050"),
              "tendiachi": "Xã Lạc Quới"
            },
            {
              "_id": ObjectId("5576f1e9d89398b406000051"),
              "tendiachi": "Xã Núi Tô"
            },
            {
              "_id": ObjectId("5576f1f0d89398b406000052"),
              "tendiachi": "Xã Tà Đảnh"
            },
            {
              "_id": ObjectId("5576f1f6d89398b406000053"),
              "tendiachi": "Xã Tân Tuyến"
            },
            {
              "_id": ObjectId("5576f1fbd89398b406000054"),
              "tendiachi": "Xã Vĩnh Gia"
            },
            {
              "_id": ObjectId("5576f201d89398b406000055"),
              "tendiachi": "Xã Vĩnh Phước"
            },
            {
              "_id": ObjectId("5576f207d89398b406000056"),
              "tendiachi": "Xã Ô Lâm"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed6dd89398ec0700002f"),
          "tendiachi": "Huyện Phú Tân",
          "level4": [
            {
              "_id": ObjectId("5576f081d89398b40600003c"),
              "tendiachi": "Thị Trấn Chợ Vàm"
            },
            {
              "_id": ObjectId("5576f087d89398b40600003d"),
              "tendiachi": "Thị Trấn Phú Mỹ"
            },
            {
              "_id": ObjectId("5576f09bd89398b40600003e"),
              "tendiachi": "Xã Bình Thạnh Đông"
            },
            {
              "_id": ObjectId("5576f0a0d89398b40600003f"),
              "tendiachi": "Xã Hiệp Xương"
            },
            {
              "_id": ObjectId("5576f0a6d89398b406000040"),
              "tendiachi": "Xã Hòa Lạc"
            },
            {
              "_id": ObjectId("5576f0b2d89398ec07000043"),
              "tendiachi": "Xã Long Hòa"
            },
            {
              "_id": ObjectId("5576f0bdd89398ec07000044"),
              "tendiachi": "Xã Phú An"
            },
            {
              "_id": ObjectId("5576f0d1d89398ec07000045"),
              "tendiachi": "Xã Phú Bình"
            },
            {
              "_id": ObjectId("5576f0d6d89398ec07000046"),
              "tendiachi": "Xã Phú Hiệp"
            },
            {
              "_id": ObjectId("5576f0ded89398ec07000047"),
              "tendiachi": "Xã Phú Hưng"
            },
            {
              "_id": ObjectId("5576f0e4d89398ec07000048"),
              "tendiachi": "Xã Phú Long"
            },
            {
              "_id": ObjectId("5576f0ebd89398ec07000049"),
              "tendiachi": "Xã Phú Lâm"
            },
            {
              "_id": ObjectId("5576f0f1d89398ec0700004a"),
              "tendiachi": "Xã Phú Thành"
            },
            {
              "_id": ObjectId("5576f0f7d89398ec0700004b"),
              "tendiachi": "Xã Phú Thạnh"
            },
            {
              "_id": ObjectId("5576f0fdd89398ec0700004c"),
              "tendiachi": "Xã Phú Thọ"
            },
            {
              "_id": ObjectId("5576f103d89398ec0700004d"),
              "tendiachi": "Xã Phú Xuân"
            },
            {
              "_id": ObjectId("5576f109d89398ec0700004e"),
              "tendiachi": "Xã Tân Hòa"
            },
            {
              "_id": ObjectId("5576f110d89398ec0700004f"),
              "tendiachi": "Xã Tân Trung"
            }
          ]
        },
        {
          "_id": ObjectId("5576ed72d89398ec07000030"),
          "tendiachi": "Huyện Chợ Mới",
          "level4": [
            {
              "_id": ObjectId("5576eff2d89398ec0700003a"),
              "tendiachi": "Thị Trấn Chợ Mới"
            },
            {
              "_id": ObjectId("5576eff7d89398ec0700003b"),
              "tendiachi": "Thị Trấn Mỹ Luông"
            },
            {
              "_id": ObjectId("5576effed89398ec0700003c"),
              "tendiachi": "Xã An Thạnh Trung"
            },
            {
              "_id": ObjectId("5576f004d89398ec0700003d"),
              "tendiachi": "Xã Bình Phước Xuân"
            },
            {
              "_id": ObjectId("5576f009d89398b406000033"),
              "tendiachi": "Xã Hòa An"
            },
            {
              "_id": ObjectId("5576f011d89398b406000034"),
              "tendiachi": "Xã Hòa Bình"
            },
            {
              "_id": ObjectId("5576f018d89398b406000035"),
              "tendiachi": "Xã Hội An"
            },
            {
              "_id": ObjectId("5576f021d89398b406000036"),
              "tendiachi": "Xã Kiến An"
            },
            {
              "_id": ObjectId("5576f027d89398b406000037"),
              "tendiachi": "Xã Kiến Thành"
            },
            {
              "_id": ObjectId("5576f02dd89398b406000038"),
              "tendiachi": "Xã Long Giang"
            },
            {
              "_id": ObjectId("5576f033d89398ec0700003e"),
              "tendiachi": "Xã Long Kiến"
            },
            {
              "_id": ObjectId("5576f038d89398ec0700003f"),
              "tendiachi": "Xã Long Điền A"
            },
            {
              "_id": ObjectId("5576f049d89398ec07000040"),
              "tendiachi": "Xã Long Điền B"
            },
            {
              "_id": ObjectId("5576f04fd89398ec07000041"),
              "tendiachi": "Xã Mỹ An"
            },
            {
              "_id": ObjectId("5576f055d89398b406000039"),
              "tendiachi": "Xã Mỹ Hiệp"
            },
            {
              "_id": ObjectId("5576f05ad89398b40600003a"),
              "tendiachi": "Xã Mỹ Hội Đông"
            },
            {
              "_id": ObjectId("5576f060d89398ec07000042"),
              "tendiachi": "Xã Nhơn Mỹ"
            },
            {
              "_id": ObjectId("5576f066d89398b40600003b"),
              "tendiachi": "Xã Tấn Mỹ"
            }
          ]
        },
        {
          "_id": ObjectId("5576ee87d89398ec07000032"),
          "tendiachi": "Huyện An Phú",
          "level4": [
            {
              "_id": ObjectId("5576eea6d893980c07000029"),
              "tendiachi": "Thị Trấn An Phú",
              "level5": [
                {
                  "_id": ObjectId("5576f497d89398b406000071"),
                  "tendiachi": "Ấp An Hưng"
                },
                {
                  "_id": ObjectId("5576f49dd89398b406000072"),
                  "tendiachi": "Ấp An Thạnh"
                },
                {
                  "_id": ObjectId("5576f4a3d89398b406000073"),
                  "tendiachi": "Ấp An Thịnh"
                }
              ]
            },
            {
              "_id": ObjectId("5576eeadd893980c0700002a"),
              "tendiachi": "Thị Trấn Long Bình",
              "level5": [
                {
                  "_id": ObjectId("5576f4dbd89398b406000074"),
                  "tendiachi": "Ấp Tân Bình"
                },
                {
                  "_id": ObjectId("5576f4e1d89398f006000040"),
                  "tendiachi": "Ấp Tân Khánh"
                },
                {
                  "_id": ObjectId("5576f4e9d89398f006000041"),
                  "tendiachi": "Ấp Tân Thạnh"
                }
              ]
            },
            {
              "_id": ObjectId("5576eeb8d893980c0700002b"),
              "tendiachi": "Xã Khánh An",
              "level5": [
                {
                  "_id": ObjectId("5576f53bd89398f006000042"),
                  "tendiachi": "Ấp An Hòa"
                },
                {
                  "_id": ObjectId("5576f542d89398f006000043"),
                  "tendiachi": "Ấp An Khánh"
                },
                {
                  "_id": ObjectId("5576f547d89398b406000075"),
                  "tendiachi": "Ấp Khánh Hòa"
                },
                {
                  "_id": ObjectId("5576f54dd89398b406000076"),
                  "tendiachi": "Ấp Thạnh Phú"
                }
              ]
            },
            {
              "_id": ObjectId("5576eebdd893980c0700002c"),
              "tendiachi": "Xã Khánh Bình",
              "level5": [
                {
                  "_id": ObjectId("5576f562d89398b406000077"),
                  "tendiachi": "Ấp Bình Di"
                },
                {
                  "_id": ObjectId("5576f568d89398b406000078"),
                  "tendiachi": "Ấp Sa Tô"
                },
                {
                  "_id": ObjectId("5576f56ed89398b406000079"),
                  "tendiachi": "Ấp Vạt Lài"
                }
              ]
            },
            {
              "_id": ObjectId("5576eec3d893980c0700002d"),
              "tendiachi": "Xã Nhơn Hội",
              "level5": [
                {
                  "_id": ObjectId("5576f57fd89398b40600007a"),
                  "tendiachi": "Ấp Búng Lớn"
                },
                {
                  "_id": ObjectId("5576f585d89398b40600007b"),
                  "tendiachi": "Ấp Bắc Đai"
                }
              ]
            },
            {
              "_id": ObjectId("5576eecdd893980c0700002e"),
              "tendiachi": "Xã Phú Hội",
              "level5": [
                {
                  "_id": ObjectId("5576f594d89398b40600007c"),
                  "tendiachi": "Ấp Phú Mỹ"
                },
                {
                  "_id": ObjectId("5576f5c8d89398f006000044"),
                  "tendiachi": "Ấp Phú Nhơn"
                },
                {
                  "_id": ObjectId("5576f5cdd89398b40600007d"),
                  "tendiachi": "Ấp Phú Thuận"
                }
              ]
            },
            {
              "_id": ObjectId("5576eed3d893980c0700002f"),
              "tendiachi": "Xã Phú Hữu",
              "level5": [
                {
                  "_id": ObjectId("5576f5e4d89398b40600007e"),
                  "tendiachi": "Ấp Phú Hiệp"
                },
                {
                  "_id": ObjectId("5576f5e9d89398b40600007f"),
                  "tendiachi": "Ấp Phú Hòa"
                },
                {
                  "_id": ObjectId("5576f5efd89398b406000080"),
                  "tendiachi": "Ấp Phú Lợi"
                },
                {
                  "_id": ObjectId("5576f5f4d89398b406000081"),
                  "tendiachi": "Ấp Phú Thành"
                },
                {
                  "_id": ObjectId("5576f5fad89398b406000082"),
                  "tendiachi": "Ấp Phú Thạnh"
                }
              ]
            },
            {
              "_id": ObjectId("5576eed9d893980c07000030"),
              "tendiachi": "Xã Phước Hưng",
              "level5": [
                {
                  "_id": ObjectId("5576f610d89398b406000083"),
                  "tendiachi": "Ấp Phước Hòa"
                },
                {
                  "_id": ObjectId("5576f618d89398b406000084"),
                  "tendiachi": "Ấp Phước Khánh"
                },
                {
                  "_id": ObjectId("5576f620d89398b406000085"),
                  "tendiachi": "Ấp Phước Mỹ"
                },
                {
                  "_id": ObjectId("5576f627d89398f006000045"),
                  "tendiachi": "Ấp Phước Thạnh"
                }
              ]
            },
            {
              "_id": ObjectId("5576eedfd893980c07000031"),
              "tendiachi": "Xã Quốc Thái",
              "level5": [
                {
                  "_id": ObjectId("5576f639d89398f006000046"),
                  "tendiachi": "Ấp Búng Bình Thiên"
                },
                {
                  "_id": ObjectId("5576f640d89398f006000047"),
                  "tendiachi": "Ấp Quốc Hưng"
                },
                {
                  "_id": ObjectId("5576f648d89398f006000048"),
                  "tendiachi": "Ấp Quốc Phú"
                },
                {
                  "_id": ObjectId("5576f64ed89398f006000049"),
                  "tendiachi": "Ấp Đồng Ky"
                }
              ]
            },
            {
              "_id": ObjectId("5576eee5d893980c07000032"),
              "tendiachi": "Xã Vĩnh Hậu",
              "level5": [
                {
                  "_id": ObjectId("5576f65fd89398f00600004a"),
                  "tendiachi": "Ấp Vĩnh Bảo"
                },
                {
                  "_id": ObjectId("5576f665d89398f00600004b"),
                  "tendiachi": "Ấp Vĩnh Lịnh"
                },
                {
                  "_id": ObjectId("5576f66bd89398f00600004c"),
                  "tendiachi": "Ấp Vĩnh Ngữ"
                },
                {
                  "_id": ObjectId("5576f671d89398f00600004d"),
                  "tendiachi": "Ấp Vĩnh Thuấn"
                }
              ]
            },
            {
              "_id": ObjectId("5576eeedd893980c07000033"),
              "tendiachi": "Xã Vĩnh Hội Đông",
              "level5": [
                {
                  "_id": ObjectId("5576f69fd89398f00600004e"),
                  "tendiachi": "Ấp Vĩnh An"
                },
                {
                  "_id": ObjectId("5576f6a6d89398f00600004f"),
                  "tendiachi": "Ấp Vĩnh Hòa"
                },
                {
                  "_id": ObjectId("5576f6acd89398b406000086"),
                  "tendiachi": "Ấp Vĩnh Hội"
                },
                {
                  "_id": ObjectId("5576f6b2d89398b406000087"),
                  "tendiachi": "Ấp Vĩnh Phú"
                }
              ]
            },
            {
              "_id": ObjectId("5576eef3d893980c07000034"),
              "tendiachi": "Xã Vĩnh Lộc",
              "level5": [
                {
                  "_id": ObjectId("5576f6c3d89398b406000088"),
                  "tendiachi": "Ấp Vĩnh Lợi"
                },
                {
                  "_id": ObjectId("5576f6c8d89398b406000089"),
                  "tendiachi": "Ấp Vĩnh Phước"
                }
              ]
            },
            {
              "_id": ObjectId("5576eef9d89398040800002f"),
              "tendiachi": "Xã Vĩnh Trường",
              "level5": [
                {
                  "_id": ObjectId("5576f6d7d89398b40600008a"),
                  "tendiachi": "Ấp La Ma"
                },
                {
                  "_id": ObjectId("5576f6ded89398b40600008b"),
                  "tendiachi": "Ấp Vĩnh Bình"
                },
                {
                  "_id": ObjectId("5576f6e5d89398b40600008c"),
                  "tendiachi": "Ấp Vĩnh Nghĩa"
                },
                {
                  "_id": ObjectId("5576f6ebd89398b40600008d"),
                  "tendiachi": "Ấp Vĩnh Thành"
                }
              ]
            },
            {
              "_id": ObjectId("5576ef00d893980408000030"),
              "tendiachi": "Xã Đa Phước",
              "level5": [
                {
                  "_id": ObjectId("5576f6fdd89398f006000050"),
                  "tendiachi": "Ấp Hà Bao 1"
                },
                {
                  "_id": ObjectId("5576f703d89398f006000051"),
                  "tendiachi": "Ấp Hà Bao 2"
                },
                {
                  "_id": ObjectId("5576f708d89398f006000052"),
                  "tendiachi": "Ấp Phước Quản"
                },
                {
                  "_id": ObjectId("5576f70fd89398f006000053"),
                  "tendiachi": "Ấp Phước Thọ"
                }
              ]
            }
          ]
        }
      ]
    },
    {
      "_id": ObjectId("5576ecf6d89398ec0700002b"),
      "tendiachi": "Tỉnh Đồng Tháp"
    },
    {
      "_id": ObjectId("5576ed04d893980c08000029"),
      "tendiachi": "Tỉnh Kiên Giang"
    },
    {
      "_id": ObjectId("5576ed0dd893980408000029"),
      "tendiachi": "Tỉnh Cần Thơ"
    }
  ]
});

/** diendidinhcu records **/
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5406ba9ff777dcf4070033e9"),
  "ten": "Đoàn Tụ Gia Đình"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("542bb4945c1e8815048b4569"),
  "ten": "Kết Hôn"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("542bba825c1e8840048b457d"),
  "ten": "H O"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5438a69f5c1e8814048b45a5"),
  "ten": "Con Lai"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5438b4935c1e88e7048b4569"),
  "ten": "O D P"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5438bee45c1e8840048b45e2"),
  "ten": "Vượt Biên"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5438c1e75c1e88e8048b4574"),
  "ten": "Bảo Lãnh"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5438dfe05c1e88e2048b4576"),
  "ten": "Tự Do"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5439ee705c1e8816048b4587"),
  "ten": "Bản Xứ"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("54490b1d5c1e8804068b458d"),
  "ten": "H D P"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5449b76d5c1e8894048b4598"),
  "ten": "U11"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("5449b7705c1e8894048b4599"),
  "ten": "V11"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("545351445c1e8896048b4779"),
  "ten": "H R"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("545c68cd5c1e884f0a8b4586"),
  "ten": "Lao Động"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("545de9a15c1e884e0a8b46ec"),
  "ten": "Tỵ Nạn"
});
db.getCollection("diendidinhcu").insert({
  "_id": ObjectId("545dec395c1e880a0c8b467c"),
  "ten": "Du Học"
});

/** hinhthuchoctap records **/
db.getCollection("hinhthuchoctap").insert({
  "_id": ObjectId("5406786df777dcf407005080"),
  "ten": "Tự túc"
});
db.getCollection("hinhthuchoctap").insert({
  "_id": ObjectId("543c77705c1e8826048b456d"),
  "ten": "Học Bổng Nhà Nước"
});
db.getCollection("hinhthuchoctap").insert({
  "_id": ObjectId("543c777f5c1e8862048b456e"),
  "ten": "Học Bổng Nước Ngoài"
});

/** nganhhoc records **/
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("543f28a65c1e8859048b456d"),
  "ten": "Ngoại Ngữ"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("543f94b15c1e885b048b458d"),
  "ten": "Marketting"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("543f94c05c1e882d058b4575"),
  "ten": "Tiếp Thị"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("543f956c5c1e887b058b4567"),
  "ten": "Quản Trị Kinh Doanh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544075625c1e8873048b4578"),
  "ten": "Xã Hội Nhân Văn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5440756a5c1e8826048b456a"),
  "ten": "Tin Học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544075885c1e8852048b4577"),
  "ten": "Du Lịch"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544075945c1e8851048b457c"),
  "ten": "Kế Toán"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5440759b5c1e8850048b4577"),
  "ten": "Kiểm Toán"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544087b35c1e88b5048b456d"),
  "ten": "Công Nghệ Sinh Học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5440e08f5c1e8854048b457b"),
  "ten": "Ngoại Thương"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5441df6e5c1e8863048b4590"),
  "ten": "Điều Dưỡng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5441dfb85c1e8862048b4599"),
  "ten": "Ghi Chú"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5441e1f35c1e8859048b457c"),
  "ten": "Trung Học Phổ Thông"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5441e2705c1e8893048b4575"),
  "ten": "Cơ Khí"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54422c3c5c1e881a048b45bc"),
  "ten": "Kinh Tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5445afed5c1e884f048b4575"),
  "ten": "Y Dược"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54470b8d5c1e8860068b456b"),
  "ten": "Công Nghệ Thông Tin"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54470d795c1e885f048b457f"),
  "ten": "Tài Chính Ngân Hàng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544853f85c1e8823048b4570"),
  "ten": "Nông Nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5448cb745c1e88cb048b45d8"),
  "ten": "Hóa Sinh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5449122e5c1e88cf048b45fe"),
  "ten": "Điện Tử"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5449ac935c1e889c048b4567"),
  "ten": "Anh Văn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544ca5645c1e8873048b45bb"),
  "ten": "Tôn Giáo"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544ca75a5c1e8828048b45dd"),
  "ten": "Trung Cấp Kinh Tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544cbc965c1e887e048b45e9"),
  "ten": "Không Biết"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544dbd045c1e882b048b463d"),
  "ten": "Dầu Khí"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544e49175c1e882a058b459d"),
  "ten": "Cử Nhân Y Khoa"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544e49265c1e8828058b45aa"),
  "ten": "Y Khoa"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544e4b0c5c1e882a058b459f"),
  "ten": "Luật"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544e51145c1e882c058b45b5"),
  "ten": "Xây Dựng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("544e60e85c1e8858048b45f1"),
  "ten": "Kinh Tế Nông Nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545045965c1e8899078b4571"),
  "ten": "Kinh Tế Đối Ngoại"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5451cf385c1e8814098b45c0"),
  "ten": "Nghiên Cứu Khoa Học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5451d2b85c1e8814098b45c1"),
  "ten": "Phát Triển Quan Hệ Quốc Tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545231565c1e88b8078b4695"),
  "ten": "Nhật Bản Học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5455b7725c1e88180d76a4a1"),
  "ten": "Quản Lý Khách Sạn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5455d9905c1e88070d76a4c3"),
  "ten": "Điện Tử Viễn Thông"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5456f1b25c1e882a0d76a55b"),
  "ten": "Hóa Dầu"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54573b1f5c1e88a61276a4c2"),
  "ten": "Nhiếp Ảnh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54579f225c1e88260d76a609"),
  "ten": "Tài Chính Kế Toán"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54587f825c1e88751876a4a1"),
  "ten": "Khoa Học Ngôn Ngữ"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545af03d5c1e885d2e76a526"),
  "ten": "Triết Học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545b6df75c1e88fc068b4596"),
  "ten": "Quan Hệ Quốc Tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545ba75d5c1e8826088b458e"),
  "ten": "Sự Phạm"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545c244c5c1e8804078b4606"),
  "ten": "Quản Lý Tài Chính"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545e2e895c1e88d60f8b4626"),
  "ten": "Hướng Dẫn Viên Du Lịch"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("545f38fc5c1e88f8148b45db"),
  "ten": "Thương Mại Tài Chính Quốc Tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5461b8b95c1e88700dd3d5ab"),
  "ten": "Ngân Hàng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5464b9035c1e88d2068b45a0"),
  "ten": "Tài Chính"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("5464bbef5c1e8817058b4581"),
  "ten": "Quản Lý Nguồn Nhân Lực"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4569"),
  "ten": "Hành chính công"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b456f"),
  "ten": "Khoa học máy tính"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4574"),
  "ten": "Phát triển bền vững"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4579"),
  "ten": "Enzyme thực phẩm"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b457e"),
  "ten": "Quản lí XH"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4582"),
  "ten": "Công trình đô thị"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4586"),
  "ten": "PT về giới"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b458a"),
  "ten": "Nghiên cứu phát triển QT"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b458e"),
  "ten": "Tài chính ứng dụng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4592"),
  "ten": "Khoa học Thực phẩm"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b4596"),
  "ten": "Phát triển vùng và nông thôn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b459a"),
  "ten": "Kinh tế thương mại"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b459e"),
  "ten": "Nông hóa thổ nhưỡng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45a2"),
  "ten": "Giảng dạy văn chương và Ngôn ngữ tiếng Anh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45a6"),
  "ten": "Dinh dưỡng và Quản lý Thú y"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45aa"),
  "ten": "Quản lý Môi trường và Phát triển"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45af"),
  "ten": "Nông nghiệp bền vững dựa trên chăn nuôi"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45b9"),
  "ten": "Ngôn ngữ và Văn hoá"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45bd"),
  "ten": "Công nghệ môi trường"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45c1"),
  "ten": "Công nghệ sinh học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45c5"),
  "ten": "Quản lý Giáo dục"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45c9"),
  "ten": "Kỹ thuật thực phẩm và \ncông nghệ các quá trình sinh học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45cd"),
  "ten": "Văn chương và Ngôn ngữ Trung Quốc"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45d1"),
  "ten": "Tài chính-Ngân hàng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45d8"),
  "ten": "Quản lý Môi trường"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45dc"),
  "ten": "Bảo vệ thực vật"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45e0"),
  "ten": "Công nghệ Hoá học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45e4"),
  "ten": "Năng lực lãnh đạo trong GD"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45e8"),
  "ten": "Hóa học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45ec"),
  "ten": "Viễn Thám và Thông tin địa lý"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45f0"),
  "ten": "Kỹ thuật thực phẩm và Công nghệ sinh học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45f7"),
  "ten": "Thương mại Quốc tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45fb"),
  "ten": "Khoa học về Môi trường và Quản lý"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfa5c1e88a6078b45ff"),
  "ten": "Giảng dạy tiếng Anh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4606"),
  "ten": "Chăn nuôi"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b460d"),
  "ten": "Khoa học Thủy văn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4611"),
  "ten": "Hệ thống bền vững"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4619"),
  "ten": "Marketing Nông nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4625"),
  "ten": "Xã hội học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4629"),
  "ten": "Quản trị kinh doanh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b462d"),
  "ten": "Giáo dục"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4631"),
  "ten": "Giáo dục chính trị tư tưởng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4635"),
  "ten": "Khoa học nông nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4639"),
  "ten": "Luật Kinh tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b463c"),
  "ten": "Dinh dưỡng vật nuôi"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4644"),
  "ten": "Khoa học Môi trường và Đời sống"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4648"),
  "ten": "Chính sách Giáo dục và Thực thi Chính sách"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b464c"),
  "ten": "Quản lý nước"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4650"),
  "ten": "Thống kê Toán"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4653"),
  "ten": "Văn học Cổ đại"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4657"),
  "ten": "Quản lý thông tin"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b465b"),
  "ten": "Nuôi trồng Thủy sản"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b465f"),
  "ten": "Sức khỏe cộng đồng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4663"),
  "ten": "Công nghệ thực phẩm"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b466a"),
  "ten": "Kinh tế Môi trường và Nghiên cứu tài nguyên"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b466e"),
  "ten": "Kinh tế nông nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4672"),
  "ten": "Giáo dục, ngôn ngữ"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4678"),
  "ten": "Công nghệ khoa học thực phẩm"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b467f"),
  "ten": "Ngôn ngữ ứng dụng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4683"),
  "ten": "Marketking"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4687"),
  "ten": "Khoa học ứng dụng "
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b468d"),
  "ten": "CN & Qlý MT"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4691"),
  "ten": "Phát triển nông thôn bền vững"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4696"),
  "ten": "Quản lý giáo dục"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b469a"),
  "ten": "Nông học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b46a1"),
  "ten": "LL&PPGD môn Tiếng Anh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b46a8"),
  "ten": "Kế toán"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b46b2"),
  "ten": "Toán học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b46b6"),
  "ten": "Hệ thống thông tin"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b46ba"),
  "ten": "Khoa học thông tin thư viện"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46c1"),
  "ten": "Ngữ âm học & vận dụng ngữ âm học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46c5"),
  "ten": "Nghiên cứu Giáo dục"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46c9"),
  "ten": "Tiếng Pháp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46cd"),
  "ten": "Quản trị kinh doanh marketing"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46d1"),
  "ten": "Kinh tế học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46d8"),
  "ten": "Tiếng Anh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46df"),
  "ten": "Kỹ thuật đất đai và nguồn tài nguyên nước"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46e3"),
  "ten": "Tin học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46e8"),
  "ten": "Ngoại thương"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46ed"),
  "ten": "Khoa học môi trường"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46f2"),
  "ten": "Y tế cộng đồng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46f7"),
  "ten": "Ngoại tổng quát"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46fb"),
  "ten": "Thực tập Nội trú"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b46ff"),
  "ten": "Điều dưỡng cộng đồng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4703"),
  "ten": "Điều dưỡng đa khoa"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4707"),
  "ten": "Điều dưỡng hộ sinh"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b470b"),
  "ten": "Xây dựng dân dụng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4710"),
  "ten": "Quản lý công trình"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b471c"),
  "ten": "Quản lý Khoa học và Môi trường"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4720"),
  "ten": "Giáo dục học"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4725"),
  "ten": "Nghiên cứu-Phát triển"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4729"),
  "ten": "Kinh tế đối ngoại"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4731"),
  "ten": "Khoa học - động vật"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4736"),
  "ten": "Kinh doanh Nông nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b473a"),
  "ten": "Phát triển vùng và Nông thôn"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b473e"),
  "ten": "Khoa học Phát triển bền vững"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4742"),
  "ten": "Khoa học Nông nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4746"),
  "ten": "Kinh tế"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b474a"),
  "ten": "Quản Lý Kinh Tế Nông Nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b474e"),
  "ten": "Khoa học Lâm nghiệp"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4756"),
  "ten": "Quản lý kỹ thuật xây dựng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b475e"),
  "ten": "Phát triển cộng đồng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4765"),
  "ten": "Văn học đương đại Trung Quốc"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54894cfc5c1e88a6078b4769"),
  "ten": "Quản lý xã hội"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("549786355c1e88ee048b4567"),
  "ten": "Quản Lý Xã Hội"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54cef08e5c1e88fe195e44f1"),
  "ten": "Dinh Dưỡng"
});
db.getCollection("nganhhoc").insert({
  "_id": ObjectId("54d08a3c5c1e883e275e44f1"),
  "ten": "Học Đạo"
});

/** nganhnghe records **/
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53eb2cd8f777dcd00c00542c"),
  "ten": "Giáo Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53eb2ce2f777dcd00c000035"),
  "ten": "Công Chức"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53eb2ce6f777dcd00c0037e5"),
  "ten": "Chuyên Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53eb2cf6f777dcc80c001dc0"),
  "ten": "Nông dân"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53edce20f777dc1008007fad"),
  "ten": "Quản lý Giáo dục"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("53edce2ef777dc10080020bc"),
  "ten": "Kế toán"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54069139f777dc68050078fb"),
  "ten": "Quản trị Kinh doanh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("540a6abe5c1e8823048b4567"),
  "ten": "Xây dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5418fded5c1e8825048b4567"),
  "ten": "Buôn Bán"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54222daf5c1e885b048b4567"),
  "ten": "Kinh Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542387d15c1e8825048b4568"),
  "ten": "Làm Móng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a27625c1e8827048b4567"),
  "ten": "Làm mướn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a64725c1e8825048b4573"),
  "ten": "May mặc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a648c5c1e8826048b4569"),
  "ten": "Kiến trúc sư"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a654c5c1e8890048b4570"),
  "ten": "Lao động nông nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a6f505c1e8826048b457d"),
  "ten": "Sửa xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a70455c1e8890048b4582"),
  "ten": "Chủ tịch HĐQT"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542a7af25c1e8826048b457f"),
  "ten": "Làm vườn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542b4d355c1e8828048b4567"),
  "ten": "Tài xế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542b6d2d5c1e8827048b4568"),
  "ten": "May"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("542bc78e5c1e8840048b4581"),
  "ten": "Làm Thuê"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543347ba5c1e8827048b4567"),
  "ten": "Nông nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5435e0465c1e8857048b4568"),
  "ten": "Thợ Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5435fc025c1e8856048b456b"),
  "ten": "Công nhân sơn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543600fc5c1e886e048b4567"),
  "ten": "Công nhân bánh kẹo"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543604615c1e88b8048b4567"),
  "ten": "Buôn Bán - Xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543632a35c1e8811058b4567"),
  "ten": "Buôn Bán - Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543727465c1e8858048b4573"),
  "ten": "Địa ốc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543755af5c1e885d048b458a"),
  "ten": "Thợ mộc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543779b05c1e881a058b4569"),
  "ten": "Chăn Nuôi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54377bd75c1e8891048b4591"),
  "ten": "Y khoa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5437976b5c1e885e048b458e"),
  "ten": "Thợ may"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54379aa95c1e88dd048b458c"),
  "ten": "Kết chuỗi hạt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54379dd15c1e8823048b4597"),
  "ten": "Thợ sửa xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438816b5c1e8841048b456a"),
  "ten": "Dược sĩ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543884cb5c1e8845048b4575"),
  "ten": "Công nhân cao su"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543884ec5c1e8846048b456b"),
  "ten": "Nhân viên Công ty"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54388c3f5c1e8842048b4578"),
  "ten": "Tài xế xe tải"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54388c685c1e8814048b4572"),
  "ten": "Tiếp Tân "
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54388f855c1e8880048b456c"),
  "ten": "Nhân Viên Khách Sạn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54389bdb5c1e8880048b457b"),
  "ten": "Học Nghề"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54389d925c1e8840048b459d"),
  "ten": "Công Nhân - Dệt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54389f295c1e8871048b4590"),
  "ten": "Công Nhân - Mộc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54389f895c1e8871048b4591"),
  "ten": "Bao Bì"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438a1095c1e8840048b45a9"),
  "ten": "Kỹ Thuật Viên - Nông Nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438a2015c1e8815048b459b"),
  "ten": "Công nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438a29b5c1e8818048b45ad"),
  "ten": "Giữ Trẻ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438a3685c1e8871048b4598"),
  "ten": "Cơ Khí"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438a8315c1e88a5048b4586"),
  "ten": "Kỹ Sư"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438aeb65c1e88a1048b458d"),
  "ten": "Thiết Kế Giày"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438af575c1e88df048b4567"),
  "ten": "Kỹ Sư Cơ Khí"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438b0425c1e88a6048b4587"),
  "ten": "Công Nhân - Lắp Ráp Tivi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438b2275c1e88a6048b4589"),
  "ten": "Thợ Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54389ff65c1e8881048b4596"),
  "ten": "Kỹ Sư Công Nghệ Thông Tin"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438eb115c1e88e2048b4586"),
  "ten": "Tài Xế Xe Tải"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438ef1c5c1e88e8048b457d"),
  "ten": "Thợ Làm Phụ Tùng Xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438f0745c1e88df058b4567"),
  "ten": "Chăm Sóc Da"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5438f0a15c1e88dd058b456a"),
  "ten": "Nhân Viên Du Lịch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439d7ab5c1e8816048b4567"),
  "ten": "Công Nhân - Luyện Kim"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439dabe5c1e8847048b456d"),
  "ten": "Công Nhân - Xưởng Mì"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439e0be5c1e885a048b4577"),
  "ten": "Thợ Sửa Điện Thoại"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439e2dc5c1e885b048b456a"),
  "ten": "Trồng Trà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439e30c5c1e889c048b4569"),
  "ten": "Làm Công Ty"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439e6555c1e889c048b456d"),
  "ten": "Công An"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439e7105c1e885a048b4581"),
  "ten": "Công Nhân - Sản Xuất Thiết Bị Y Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439ead65c1e885b048b4578"),
  "ten": "Không Biết"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439eb415c1e8847048b4582"),
  "ten": "Nhân Viên Bán Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439eb4a5c1e8840048b457e"),
  "ten": "Tài Xế Taxi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f10b5c1e889c048b4572"),
  "ten": "Làm Mộc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f29b5c1e8816048b458b"),
  "ten": "Sản Xuất Ống Nhựa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f3e65c1e885a048b4586"),
  "ten": "Mua Bán Cá"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f7f25c1e88fa048b4567"),
  "ten": "Điện Gia Dụng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f8665c1e88ec048b4568"),
  "ten": "Công Nhân - May Thiêu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543dc0765c1e8827048b456a"),
  "ten": "Điêu Khắc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e2f305c1e8823048b45a7"),
  "ten": "Xưởng Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544084ca5c1e886c048b4588"),
  "ten": "Xuất Gia"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544227565c1e8859048b45aa"),
  "ten": "Làm Rẫy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54431bb75c1e8826048b456e"),
  "ten": "Kinh Doanh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544332845c1e8894048b457a"),
  "ten": "Hải Quan"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("549129eb5c1e8820088b4568"),
  "ten": "Thợ Làm Tóc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54b9be895c1e8823058b4569"),
  "ten": "Uốn Tóc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5439f8b85c1e88f4048b4583"),
  "ten": "Thợ Hàn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543a431c5c1e88ef048b4590"),
  "ten": "Ca Sĩ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b15f75c1e8825048b456b"),
  "ten": "Nội Trợ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b16d25c1e885a048b4567"),
  "ten": "Công Nhân - Giày"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b180b5c1e885a048b4568"),
  "ten": "Công Nhân - Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b18175c1e884b048b456b"),
  "ten": "Công Nhân - Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b21f85c1e8883048b4567"),
  "ten": "Thợ Cửa Sắt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b2cbd5c1e8850048b457b"),
  "ten": "Công Nhân - May Da Ghế Xe Ô Tô"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b2ef15c1e884f048b4578"),
  "ten": "Bác Sĩ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b301f5c1e886e048b4588"),
  "ten": "Trồng Trọt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b31675c1e8825048b4573"),
  "ten": "Lao Động Tự Do"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b34395c1e884f048b4582"),
  "ten": "Thợ Hồ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b37465c1e889d048b456b"),
  "ten": "Trang Trí Nội Thất"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b3c465c1e8899048b4578"),
  "ten": "Nhân Viên Nuôi Trồng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b4c115c1e884f048b45a6"),
  "ten": "Thợ Nấu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b4c585c1e8850048b45b2"),
  "ten": "Công Nhân - Xe Hơi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b7a035c1e884c048b4567"),
  "ten": "Sửa Xe Du Lịch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b7a625c1e884c048b4568"),
  "ten": "Sửa Vi Tính"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b7bcb5c1e8824048b4573"),
  "ten": "Làm Than"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b7cc45c1e8824048b4578"),
  "ten": "Phục Vụ Nhà Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b97305c1e8876048b4583"),
  "ten": "Quản Lý Tiệm Internet"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b9b3a5c1e8876048b458b"),
  "ten": "Nhân Viên Ngân Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b9b615c1e88b5048b4580"),
  "ten": "Nhân Viên Nhà Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b9e5e5c1e8876048b458c"),
  "ten": "Sửa Chữa Máy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543c76715c1e8826048b456c"),
  "ten": "Công Nhân"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543c987e5c1e8871058b456b"),
  "ten": "Thủy Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543cc7e65c1e880d068b456b"),
  "ten": "Đánh Cá"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543cdd135c1e8811068b4594"),
  "ten": "Kỹ Sư Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543ce85f5c1e886e058b45cd"),
  "ten": "Quản Lý Kinh Doanh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543ce9705c1e880d068b45ba"),
  "ten": "Làm Bánh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543ceac85c1e8811068b45a2"),
  "ten": "Du Lịch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543d22285c1e8859048b4567"),
  "ten": "Nhân Viên Y Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543d23255c1e881f048b4568"),
  "ten": "Kỹ Sư Đóng Tàu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543d28495c1e881f048b456d"),
  "ten": "Chủ Cửa Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543dbb625c1e884a048b4571"),
  "ten": "Nhà Hàng, Khách Sạn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b39975c1e8899048b4576"),
  "ten": "Nhân Viên Sòng Bài"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543dbdd75c1e884f048b4567"),
  "ten": "Quân Nhân"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543b909f5c1e885a048b457b"),
  "ten": "Quân Nhân Campuchia"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543df2535c1e88a8048b4579"),
  "ten": "Hướng Dẫn Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e2fe15c1e884a048b457f"),
  "ten": "Công Ty May"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e31e85c1e886c048b4588"),
  "ten": "Xã Hội Nhân Văn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e33fb5c1e8875048b4579"),
  "ten": "Dịch Vụ Ăn Uống"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e41505c1e886d048b4598"),
  "ten": "Kỹ Sư Ô Tô"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543e416e5c1e8875048b4594"),
  "ten": "Kỹ Sư Xe Hơi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543f27105c1e8825048b4571"),
  "ten": "In Tem Xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544062895c1e8851048b4570"),
  "ten": "Đầu Bếp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544076e25c1e884c048b4573"),
  "ten": "Điện Lực"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5440770a5c1e8850048b4578"),
  "ten": "Cơ Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441cc195c1e8860048b4576"),
  "ten": "May Nệm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441cc795c1e881a048b457a"),
  "ten": "Dụng Cụ Y Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441ccb45c1e8860048b4579"),
  "ten": "Sản Xuất Chỉ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441cce65c1e8819048b457b"),
  "ten": "Xưởng Bánh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441d2fd5c1e8819048b458a"),
  "ten": "Bảo Vệ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441d3085c1e8861048b4575"),
  "ten": "Kế Toán"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441d3185c1e8893048b4567"),
  "ten": "Y Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5441e0645c1e8863048b4592"),
  "ten": "Dán Bông Ly"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("543cc7015c1e880b068b4576"),
  "ten": "Công Nhân - May"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5435fb0e5c1e883a048b4575"),
  "ten": "Công Nghệ Thông Tin"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54431c0c5c1e8856048b457f"),
  "ten": "Buôn Bán - Thức Ăn Gia Súc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54431c9e5c1e8874048b456d"),
  "ten": "Nhân Viên Công Ty"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54432f1f5c1e8825048b4576"),
  "ten": "Điện Lạnh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544333435c1e8852048b457b"),
  "ten": "Y Tá"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544335565c1e8874048b459c"),
  "ten": "Tiếp Thị"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544337cb5c1e8873048b45a4"),
  "ten": "Lao Động Phổ Thông"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5444505b5c1e888307612ce3"),
  "ten": "Điều Dưỡng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544451035c1e888307612ce4"),
  "ten": "Thuyền Trưởng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5444529f5c1e888307612ce5"),
  "ten": "Trang Điểm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54446a625c1e88b107612cfe"),
  "ten": "Thợ Kim Hoàn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54446eba5c1e88ad07612cfe"),
  "ten": "Thợ Sửa Nhà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544474445c1e88ae07612cfd"),
  "ten": "Giám Đốc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544505335c1e8852048b456e"),
  "ten": "Phóng Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544505d05c1e8852048b456f"),
  "ten": "Nhân Viên Quán Ăn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544507d95c1e884f048b456d"),
  "ten": "Chế Biến Thực Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544709c15c1e8859048b459c"),
  "ten": "Thủ Công"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54470fff5c1e8860068b4576"),
  "ten": "Tiếp Viên Cà Phê"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54471fcf5c1e8878068b457c"),
  "ten": "Kỹ Sư Trồng Trọt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54474e495c1e8876068b4598"),
  "ten": "Thất Nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544775205c1e8871078b4567"),
  "ten": "Quản Lý"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5448655e5c1e8881048b457c"),
  "ten": "Kỹ Sư Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54486e835c1e8881048b4589"),
  "ten": "Hộ Lý"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5448baf55c1e88cf048b458e"),
  "ten": "Y Dược"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5448bcc05c1e88cb048b45a8"),
  "ten": "Người Mẫu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5448bf705c1e88d1048b4596"),
  "ten": "Làm Công"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5448cc2d5c1e8875058b4586"),
  "ten": "Quản Lý Tài Chính"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5449b0215c1e889c048b456e"),
  "ten": "Hưu Trí"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544a4ccd5c1e884d048b456f"),
  "ten": "Làm Ruộng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544a4de35c1e8851048b4570"),
  "ten": "Chạy Xe Bò"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b007d5c1e8856048b4567"),
  "ten": "Xem Ghi Chú"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b12d65c1e8855048b4567"),
  "ten": "Bán Thuốc (tây)"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b3efd5c1e8867048b45b2"),
  "ten": "Kinh Doanh Trà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b402d5c1e8852048b45ae"),
  "ten": "Phi Công"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b403d5c1e8855048b45a7"),
  "ten": "Hàng Không"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b439c5c1e8867048b45bb"),
  "ten": "Đi Học"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b440e5c1e8857048b4597"),
  "ten": "Bánh Mì"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b44705c1e8857048b4598"),
  "ten": "Nhà Khoa Học"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b458c5c1e88f7048b457d"),
  "ten": "Công Nhân Giấy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544b471e5c1e8822048b45a6"),
  "ten": "Xét Nghiệm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544c6cc55c1e8873048b458f"),
  "ten": "Nhân Viên Bưu Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544c72e45c1e884e048b45b2"),
  "ten": "Nhân Viên Siêu Thị"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544c74075c1e884e048b45b4"),
  "ten": "Điện Dân Dụng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544c9ce05c1e8855048b45cc"),
  "ten": "Thợ Tiện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544c9f0f5c1e8855048b45cd"),
  "ten": "Sửa Ô Tô"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544ca1415c1e8875048b45e2"),
  "ten": "Lắp Rắp Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544ca6185c1e8873048b45bc"),
  "ten": "Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544caba55c1e8828048b45e5"),
  "ten": "Sửa Chữa Nhà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544d90685c1e884e048b460c"),
  "ten": "Làm Nông"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544dbe265c1e886d058b458b"),
  "ten": "Phục Vụ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544dfc055c1e882b058b4567"),
  "ten": "Phụ Bếp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e1bfe5c1e8828058b4597"),
  "ten": "Công Ty Bánh Kẹo"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e392f5c1e8828058b459d"),
  "ten": "Sửa Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e3ac55c1e8819058b45b7"),
  "ten": "Hái Trà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e3ef65c1e881e058b459a"),
  "ten": "Xẻ Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e662c5c1e8843048b45f5"),
  "ten": "Thêu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e72145c1e8819058b45f5"),
  "ten": "Công Nhân Sữa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544e73225c1e8843048b45f9"),
  "ten": "Công Nhân Xưởng Gổ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f0f955c1e8846048b457c"),
  "ten": "Dịch Vụ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f10f85c1e883e048b4573"),
  "ten": "Thợ Cơ Khí"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f452c5c1e880c048b4583"),
  "ten": "Buôn Bán - Vật Liệu Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f47dd5c1e880c048b4590"),
  "ten": "Trồng Nho - Chế Biến Rượu Nho"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f4f4a5c1e883f048b4587"),
  "ten": "Trồng Cây Kiểng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("544f94c15c1e8846048b45a7"),
  "ten": "Làm Võ Điện Thoại"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545036cb5c1e88ce048b45bc"),
  "ten": "Buôn Bán - Bất Động Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545038755c1e886a048b45d4"),
  "ten": "Nhân Viên Quán Nước"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54503d5c5c1e88eb058b4588"),
  "ten": "Buôn Bán - Hàng Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54503e285c1e88eb058b4589"),
  "ten": "Lắp Ráp Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54503fd75c1e8899078b456c"),
  "ten": "Viễn Thông"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545044ce5c1e8898078b4584"),
  "ten": "Công Nhân - Trà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545049425c1e880b048b4623"),
  "ten": "Công Nhân Nước Sạch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54504e4a5c1e880b048b4630"),
  "ten": "Chủ Xưởng Bánh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54505f5a5c1e88b8078b458d"),
  "ten": "Công Ty Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450a2d65c1e8899078b45b6"),
  "ten": "Thợ Cửa Kiếng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450ad155c1e88fb058b4608"),
  "ten": "Điện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450da6f5c1e8896048b4670"),
  "ten": "Chụp Hình"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450e0db5c1e8896048b4675"),
  "ten": "Nấu Thuốc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450e32b5c1e88fb058b4631"),
  "ten": "Kiểm Tra Hàng Mỹ Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450e4f55c1e88a0078b4609"),
  "ten": "Công Nhân Nông Nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5450e7b05c1e8898078b461a"),
  "ten": "Nhân Viên Hãng Bia"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545100c15c1e8813098b458e"),
  "ten": "Kỹ Thuật Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545105e95c1e885c088b4604"),
  "ten": "Buôn Bán - Gia Súc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545114475c1e8814098b45a2"),
  "ten": "Buôn Bán - Thực Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545116685c1e88a0078b463f"),
  "ten": "Công Nhân Đông Lạnh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545116a95c1e8814098b45a3"),
  "ten": "Làm Máy Che Di Động"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54511b185c1e8814098b45ae"),
  "ten": "Công Nhân Làm Viết Bút Chì"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54511c365c1e88a0078b4648"),
  "ten": "Hàn Sắt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54511dcb5c1e8896048b46a1"),
  "ten": "Hốt Thuốc Bắc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545185155c1e88a0078b4650"),
  "ten": "Mua Phế Liệu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5451dfe45c1e8815098b45db"),
  "ten": "Công Ty Điện Thoại"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5451ea205c1e8898078b4698"),
  "ten": "Bỏ Báo"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545222bd5c1e8815098b45ee"),
  "ten": "Công Nhân Hàn Tiện"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545223085c1e8813098b45f4"),
  "ten": "Công Nhân Lắp Ráp Xe Gắn Máy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5452d1085c1e88fb058b46ef"),
  "ten": "Buôn Bán - Trái Cây"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5453047a5c1e886d0e8b457b"),
  "ten": "Công Nhân - Công Ty Cửa Sắt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545305625c1e8814098b4626"),
  "ten": "Công Nhân - Trang Trí Nội Thất"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54530a665c1e8814098b462c"),
  "ten": "Thợ Sửa Ống Nước"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545329ec5c1e8898078b46e5"),
  "ten": "Làm Đường Ống Thông Gió"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5454df255c1e88ec088b456b"),
  "ten": "Dịch Vụ In Thiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5454dfba5c1e884b098b456b"),
  "ten": "Đài Truyền Hình"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5454e6325c1e88fa088b457a"),
  "ten": "Giày Da"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5454e6a25c1e884c098b4575"),
  "ten": "Giáy Da"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54555a9e5c1e8850098b4580"),
  "ten": "Phụ Hồ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545564fa5c1e884b098b45ad"),
  "ten": "Công An Giao Thông"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545592255c1e883b0c76a497"),
  "ten": "Nhiếp Ảnh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545592f05c1e88710c76a497"),
  "ten": "Thợ Máy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455953d5c1e883b0c76a49c"),
  "ten": "Chế Biến Nhựa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455afe45c1e88180d76a4a0"),
  "ten": "Thợ Điện, Nước"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455d7075c1e88070d76a4bb"),
  "ten": "Giặt Ủi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455dd8c5c1e88290d76a4cf"),
  "ten": "Gốm Sứ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455e5885c1e88230e76a494"),
  "ten": "Công Nhân Viên Chức"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455e97f5c1e88230d76a4de"),
  "ten": "Thợ Bạc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5455ec5f5c1e88260d76a4ea"),
  "ten": "Kiểm Máy Hàng Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545632655c1e88240e76a4c4"),
  "ten": "Casino"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5456ef6e5c1e88b40f76a4db"),
  "ten": "Công Nhân Sản Xuất Thép"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5456f46f5c1e88441276a4d8"),
  "ten": "Thợ Làm Kinh Xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5456f54e5c1e88b40f76a4e0"),
  "ten": "Quản Lý Cấp Nhà"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5456f8295c1e88230d76a5c1"),
  "ten": "Nhân Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5456f9415c1e88b40f76a4e7"),
  "ten": "Nhân Viên Bất Động Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54572eab5c1e88260d76a5a1"),
  "ten": "Lắp Ráp Xe Đạp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545745675c1e88230d76a5f1"),
  "ten": "Nhà Báo"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54574afd5c1e88441276a514"),
  "ten": "Luật Sư Kinh Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545772495c1e88a01276a50e"),
  "ten": "Làm Bàn Ghế Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54577b565c1e885a1376a4d0"),
  "ten": "Massage"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54577d2c5c1e88a61276a4fc"),
  "ten": "Công Nhân Sản Xuất Dụng Cụ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5457b2855c1e88d61476a4ad"),
  "ten": "Nhuộm Vải"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5457b6c95c1e88d61476a4b6"),
  "ten": "Công Nhân Sản Xuất Đinh"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5457b7da5c1e88d91476a4c5"),
  "ten": "Sản Xuất Máy Chụp Hình"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545815645c1e88a01276a566"),
  "ten": "Giúp Việc"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54581a0d5c1e88260d76a626"),
  "ten": "Hướng Dẫn Viên Du Lịch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54585fcf5c1e88d61476a4fe"),
  "ten": "Làm Cho Chính Phủ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5458615f5c1e88dd1776a4aa"),
  "ten": "Công Ty Xuất Khẩu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5458d10b5c1e88441276a5f1"),
  "ten": "Thợ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5458dd685c1e88651776a53a"),
  "ten": "Tiếp Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54594fe35c1e88761876a4eb"),
  "ten": "Phiên Dịch Lao Động Vn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545950a95c1e88da1476a5a7"),
  "ten": "Xâm Mắt, Môi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545a02415c1e887e2c76a49a"),
  "ten": "Dệt"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545a27da5c1e885d2e76a497"),
  "ten": "Kinh Doan Băng Đĩa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545a45fa5c1e887c2c76a4f8"),
  "ten": "Bảo Hiểm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545a52de5c1e885f2e76a4e2"),
  "ten": "Chăm Sóc Người Già"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545aeee55c1e887c2c76a54c"),
  "ten": "Cầu Đường"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b22505c1e882b078b4567"),
  "ten": "Ngành Ăn, Uống"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b24205c1e88fc068b456c"),
  "ten": "Luật Sư"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b38d85c1e8821078b458c"),
  "ten": "Công Nghệ Thực Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b6a7a5c1e882d078b4597"),
  "ten": "Thu Ngân"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b73475c1e881f078b45b2"),
  "ten": "Kỹ Sư Điện Tử"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b8f755c1e8840088b4574"),
  "ten": "Đi Tàu Biển"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545b9c655c1e8825088b4597"),
  "ten": "Thợ Sơn Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545c90f85c1e884e0a8b45fc"),
  "ten": "Công Nhân Chế Biến Thực Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545cbe315c1e884d0a8b4623"),
  "ten": "Làm Hãng Bông"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545cc1f45c1e8840088b4631"),
  "ten": "Nuôi Bò Sữa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545cd5cf5c1e88d50c8b458d"),
  "ten": "Kinh Doanh Dịch Vụ Net"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545cde245c1e887e0c8b4597"),
  "ten": "Dựa Trái Cây"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545cf4225c1e8840088b467e"),
  "ten": "Làm Thuê Xưởng Ghế Sa Long"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545d796e5c1e8840088b4688"),
  "ten": "Thợ Sơn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545d7bb55c1e880a0c8b45fb"),
  "ten": "Đóng Tàu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545d86255c1e88d70c8b45a1"),
  "ten": "Lâm Nghiệp"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545d90515c1e880a0c8b4620"),
  "ten": "Giám Sát Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545dce905c1e887e0c8b4604"),
  "ten": "Quản Lý Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545ddded5c1e88c2108b4587"),
  "ten": "Sinh Viên - Y Dược"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545ec7f75c1e88c4108b45e6"),
  "ten": "Thầu Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545ecdbe5c1e884e0a8b4731"),
  "ten": "Sinh Viên"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545ee3f95c1e884e0a8b4753"),
  "ten": "Vật Liệu Y Tế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545ee4555c1e88100d8b4688"),
  "ten": "May Thảm Xe"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545f16815c1e88fd148b4571"),
  "ten": "Đóng Tủ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545f18b75c1e88ff148b4575"),
  "ten": "Thông Tin"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545f1aa25c1e88fb148b458c"),
  "ten": "Photocopy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545f21ff5c1e88f6148b457e"),
  "ten": "Nha Khoa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("545f3afe5c1e88f6148b45a1"),
  "ten": "Nghề Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54600c3f5c1e88d707d3d5ac"),
  "ten": "Thợ Rèn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546063b05c1e88d607d3d5d5"),
  "ten": "Công Nhân - Sắt Thép"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5460644f5c1e886007d3d5bf"),
  "ten": "Kinh Doanh Bất Động Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5460bfbb5c1e886107d3d61e"),
  "ten": "Thợ In"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5460c2b75c1e88d507d3d64e"),
  "ten": "In Sách"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5460c8dd5c1e882309d3d604"),
  "ten": "Mua Bán Bất Động Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5460e5d15c1e881b09d3d618"),
  "ten": "Bán Đồ Lưu Niệm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5461826d5c1e885d07d3d6be"),
  "ten": "Ngân Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5461b0095c1e881b09d3d6ab"),
  "ten": "Công Ty Mỹ Phẩm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5461b48a5c1e88680dd3d5aa"),
  "ten": "Thẩm Mỹ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5461b7265c1e88630dd3d5ae"),
  "ten": "Lắp Ráp Xe Máy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546213725c1e881812d3d5b0"),
  "ten": "Trồng Rau Sạch"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546213c55c1e885b0ed3d5b5"),
  "ten": "Lắp Ráp Xe Hơi"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546214135c1e881812d3d5b1"),
  "ten": "Xay Sát"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54622cb65c1e88d507d3d7c9"),
  "ten": "Công Ty Sơn"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54622e3e5c1e88d507d3d7cd"),
  "ten": "Công Ty Ô Tô"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546232bc5c1e88630dd3d65a"),
  "ten": "Xưởng Thép"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546245ea5c1e88c61fd3d5e9"),
  "ten": "Bưu Chính"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546296015c1e884b0ed3d64b"),
  "ten": "Công Ty Nhựa"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546296cc5c1e88710dd3d658"),
  "ten": "Công Ty Giấy"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546462695c1e8830058b4583"),
  "ten": "Kỹ Sư Tin Học"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("546467fa5c1e8852098b458b"),
  "ten": "Công Nhân Bao Bì"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5464b5275c1e8815058b459c"),
  "ten": "Chà Nhám Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5464b9845c1e8816058b45a8"),
  "ten": "Thu Mua Phế Liệu"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("5464ba6e5c1e88d4068b4599"),
  "ten": "Công Ty Gỗ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54869b0e5c1e885d0f852b67"),
  "ten": "Công Nhân - Gạch Men"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54b4da205c1e88f608635885"),
  "ten": "Chế Biến Thủy Sản"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54ba740f5c1e8812078b4567"),
  "ten": "Trồng Cà Phê"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54bc7dfd5c1e88181074cec0"),
  "ten": "Chủ Nhà Hàng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54be63445c1e88f4068b4567"),
  "ten": "Thiết Kế"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54be63745c1e8815058b4567"),
  "ten": "Kiểm Định Xây Dựng"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54c05d485c1e88e00f8b4569"),
  "ten": "Công Ty Bảo Hiểm"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54c0649e5c1e881e108b456a"),
  "ten": "Công Ty Thuốc Lá"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54c19b7a5c1e888c138b4569"),
  "ten": "Công Nhân Điện Thoại"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54d9cbbb5c1e882e0b8b4567"),
  "ten": "Thủy Thủ"
});
db.getCollection("nganhnghe").insert({
  "_id": ObjectId("54622c6f5c1e885d0ed3d5fd"),
  "ten": "Buôn Bán - Tạp Hóa"
});

/** quocgia records **/
db.getCollection("quocgia").insert({
  "_id": ObjectId("53eb29d0f777dcd40c000390"),
  "ten": "Hàn Quốc"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("53eb29d3f777dcd40c002ba5"),
  "ten": "Anh"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("54067fd8f777dcf4070002a9"),
  "ten": "Đài Loan"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("541935eb5c1e8822048b4567"),
  "ten": "Malaysia"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("541935f45c1e8823048b4567"),
  "ten": "Nhật Bản"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("541935fe5c1e8824048b4567"),
  "ten": "Singapore"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5419360e5c1e8825048b4567"),
  "ten": "Thái Lan"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("54222a765c1e885a048b4567"),
  "ten": "Canada"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5428d85b5c1e8827048b4567"),
  "ten": "Úc"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5429069c5c1e884c048b4568"),
  "ten": "Pháp"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("542a5bfb5c1e8892048b456b"),
  "ten": "Campuchia"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("542bbff65c1e8845048b4570"),
  "ten": "Đức"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5435f1295c1e8809048b456c"),
  "ten": "Bỉ"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543650945c1e88b9048b458c"),
  "ten": "Thụy Sĩ"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543656375c1e88c9048b4584"),
  "ten": "Hà Lan"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543726685c1e8826048b4569"),
  "ten": "Thụy Điển"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543741925c1e8891048b4572"),
  "ten": "New Zealand"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543742585c1e8826048b456b"),
  "ten": "Ý"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543782575c1e8857048b4586"),
  "ten": "Áo"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5439d8845c1e8817048b456a"),
  "ten": "Nam Tư"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543a34955c1e88fa048b4585"),
  "ten": "Hồng Kông"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543b14b65c1e8824048b456a"),
  "ten": "Việt Nam"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543b3f6a5c1e8825048b4586"),
  "ten": "Ấn Độ"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543b4b055c1e884f048b45a4"),
  "ten": "Philippines"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543b96615c1e88e5048b4567"),
  "ten": "Na Uy"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543c73ca5c1e8861048b4568"),
  "ten": "Mỹ"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("543dc4385c1e8850048b456b"),
  "ten": "Đan Mạch"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544080145c1e8826048b456f"),
  "ten": "Czech"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5441df855c1e881a048b459d"),
  "ten": "Indonesia"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544618bd5c1e88ad058b456f"),
  "ten": "Lào"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544778625c1e8871078b4568"),
  "ten": "Phần Lan"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544853e55c1e886e048b456c"),
  "ten": "Tiệp Khắc"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5448cb665c1e8852058b458d"),
  "ten": "Thổ Nhĩ Kỳ"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544ca4fa5c1e8827048b45e6"),
  "ten": "Ai Cập"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544e6ba65c1e8843048b45f6"),
  "ten": "Yemen"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("545045195c1e8898078b4585"),
  "ten": "Ba Lan"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5459c6395c1e88072876a499"),
  "ten": "Ireland"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("545c2ec35c1e884d0a8b4585"),
  "ten": "Tây Ban Nha"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("54894cfb5c1e88a6078b4643"),
  "ten": "Nhật"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("548a541c5c1e884a088b4695"),
  "ten": "Trung Quốc"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("5498e3a65c1e8831078b4569"),
  "ten": "Mexico"
});
db.getCollection("quocgia").insert({
  "_id": ObjectId("544b423c5c1e8857048b4592"),
  "ten": "Ả-Rập Xê-Út"
});

/** sessions records **/
db.getCollection("sessions").insert({
  "_id": ObjectId("5577938d4821295475d8104f"),
  "session_id": "uvh850hjhunrb346na3rvhvs17",
  "data": "",
  "timedout_at": NumberLong(1433905925),
  "expired_at": NumberLong(1433935917)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("557793c54821295475d81051"),
  "session_id": "kh7a7l63sbq65r7gmh7v0m2t81",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1433913900),
  "expired_at": NumberLong(1433935973)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("55779d984821295475d81052"),
  "session_id": "5e5g4o13rnj03bsorkq84pr387",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1433914387),
  "expired_at": NumberLong(1433938488)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("5577b5712ab956904f9751d6"),
  "session_id": "smvp3ai4had04tmlkhb5jecdc2",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1433914605),
  "expired_at": NumberLong(1433944593)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("5577d7e12ab956904f9751d7"),
  "session_id": "r6jhnd2u9r5c3ps934no6g5gi4",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1433933313),
  "expired_at": NumberLong(1433953409)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("5577d9db2ab956904f9751da"),
  "session_id": "5qg2gcp3r4i6m0s36m8scbs8g5",
  "data": "",
  "timedout_at": NumberLong(1433923981),
  "expired_at": NumberLong(1433953915)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("5577ed2f2ab956904f9751e0"),
  "session_id": "0gj49tgmv84npokuqj5t8j0jd2",
  "data": "user_id|s:24:\"5429fce75c1e8892048b4567\";roles|i:7;",
  "timedout_at": NumberLong(1433935762),
  "expired_at": NumberLong(1433958863)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("557806262ab956904f9751e2"),
  "session_id": "aj901q639kt78v47tpqhuc5003",
  "data": "",
  "timedout_at": NumberLong(1433935254),
  "expired_at": NumberLong(1433965254)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("557933e596b46df4876df1df"),
  "session_id": "24k484vb7s5utmooeue88s2i92",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1434016768),
  "expired_at": NumberLong(1434042501)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("559b2d42c60298b00f724b89"),
  "session_id": "7eud0r7cb4i9nveseuokohkng7",
  "data": "user_id|s:24:\"53d217fdff9cf3300a007389\";roles|i:7;",
  "timedout_at": NumberLong(1436242553),
  "expired_at": NumberLong(1436269026)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("559b2f32c60298b00f724b8d"),
  "session_id": "21qc67f5bufch04cl3eu93gkc4",
  "data": "user_id|s:24:\"542a00aa5c1e8890048b4568\";roles|i:7;",
  "timedout_at": NumberLong(1436245215),
  "expired_at": NumberLong(1436269522)
});
db.getCollection("sessions").insert({
  "_id": ObjectId("559b37dfc60298b00f724b92"),
  "session_id": "hqf588fhj1v3adsvah0v3vhec0",
  "data": "user_id|s:24:\"53d217fdff9cf3300a007389\";roles|i:7;",
  "timedout_at": NumberLong(1436244361),
  "expired_at": NumberLong(1436271743)
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.coquancongtac"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.diendidinhcu"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.hinhthuchoctap"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.nganhhoc"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.nganhnghe"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.quocgia"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.tinhtranglaodong"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.tongiao"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.trinhdo"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.users"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.sessions"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.diachi"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "name": "_id_",
  "ns": "dfa-v1.congdan"
});

/** tinhtranglaodong records **/
db.getCollection("tinhtranglaodong").insert({
  "_id": ObjectId("5577e30f5c1e88ed048b456a"),
  "ten": "Đã Về Nước"
});
db.getCollection("tinhtranglaodong").insert({
  "_id": ObjectId("5577e3395c1e88e9048b456c"),
  "ten": "Ở Nước Ngoài"
});

/** tongiao records **/
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2ad4f777dcdc0c005968"),
  "ten": "Hồi Giáo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b26f777dcdc0c007cfe"),
  "ten": "Phật Giáo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b2df777dcdc0c00263d"),
  "ten": "Công Giáo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b3bf777dcdc0c006e7e"),
  "ten": "Cao Đài"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b41f777dcdc0c000728"),
  "ten": "Minh Sư Đạo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b49f777dcd00c0013e9"),
  "ten": "Minh Lý Đạo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b51f777dcd00c007983"),
  "ten": "Tin Lành"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b61f777dcdc0c002f0c"),
  "ten": "Phật Giáo - Tịnh Độ Cư Sĩ"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b72f777dcdc0c004626"),
  "ten": "Bửu Sơn Kỳ Hương"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b7ff777dcdc0c00456d"),
  "ten": "Đạo Baha’i"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("53eb2b86f777dcdc0c003305"),
  "ten": "Bà La Môn"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("543650605c1e8857048b45a8"),
  "ten": "Phật Giáo - Hòa Hảo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("5439fc045c1e885a048b4594"),
  "ten": "Không Tôn Giáo"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("5442263e5c1e8817048b45c8"),
  "ten": "Tứ Ân Hiếu Nghĩa"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("545a19cd5c1e887e2c76a4aa"),
  "ten": "Phật Giáo - Thiền Lâm"
});
db.getCollection("tongiao").insert({
  "_id": ObjectId("545a19f45c1e887d2c76a4b2"),
  "ten": "Phật Giáo - Trúc Lâm "
});

/** trinhdo records **/
db.getCollection("trinhdo").insert({
  "_id": ObjectId("53eb2c35f777dcd80c002a38"),
  "ten": "Thạc sĩ"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("53eb2c45f777dcd80c0026b1"),
  "ten": "Cao đẳng"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("53eb2c4af777dcd40c0012c2"),
  "ten": "Trung Cấp Chuyên Nghiệp"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("54068d7ff777dc1405004cef"),
  "ten": "Tiến sĩ"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("542a26025c1e88d6048b4567"),
  "ten": "Trung học Phổ thông"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("542a651b5c1e8825048b4574"),
  "ten": "3/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("542a661e5c1e8826048b456d"),
  "ten": "10/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("542a66a45c1e8826048b456e"),
  "ten": "0/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("542b6d165c1e8881048b4567"),
  "ten": "5/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5434accf5c1e8814048b456e"),
  "ten": "9/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5435fb8a5c1e880a048b4569"),
  "ten": "12/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5436392f5c1e88c9048b4570"),
  "ten": "6/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("54379bd15c1e882e058b4588"),
  "ten": "Trung Học Cơ Sở"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("54379c5d5c1e8857048b459f"),
  "ten": "Chứng Chỉ Nghề"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("543882f85c1e8844048b456f"),
  "ten": "7/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5438840b5c1e8841048b456b"),
  "ten": "4/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("543899575c1e8871048b4585"),
  "ten": "8/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5439f4a05c1e885b048b457d"),
  "ten": "11/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("543c771d5c1e8829048b4572"),
  "ten": "2/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("544088125c1e8826048b4577"),
  "ten": "Kỹ Sư"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5442269c5c1e881b048b45ba"),
  "ten": "1/12"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("544855205c1e886e048b456d"),
  "ten": "Trung Cấp"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("5455d8015c1e88070d76a4bc"),
  "ten": "Cử Nhân"
});
db.getCollection("trinhdo").insert({
  "_id": ObjectId("549248085c1e88cd068b456b"),
  "ten": null
});

/** users records **/
db.getCollection("users").insert({
  "_id": ObjectId("53d217fdff9cf3300a007389"),
  "username": "admin",
  "password": "574125b4de1dee8ca69010cb4413573d",
  "roles": NumberLong(7),
  "person": "Sở Ngoại Vụ"
});
db.getCollection("users").insert({
  "_id": ObjectId("5429fce75c1e8892048b4567"),
  "username": "nhnhung",
  "password": "e23c9babe355be651d8d743f83d6a7da",
  "roles": NumberLong(7),
  "person": "Nguyễn Hồng Nhung"
});
db.getCollection("users").insert({
  "_id": ObjectId("542a00975c1e8826048b4567"),
  "username": "ntkyen",
  "password": "98dae0e08c01f9e64dc3f9650eb5a714",
  "roles": NumberLong(4),
  "person": "Nguyễn Thị Kim Yến"
});
db.getCollection("users").insert({
  "_id": ObjectId("542a00aa5c1e8890048b4568"),
  "username": "nvphuc",
  "password": "9fbc68a0703991c3a8a625313bef689d",
  "roles": NumberLong(7),
  "person": "Nguyễn Văn Phúc"
});
db.getCollection("users").insert({
  "_id": ObjectId("542a00c55c1e8891048b4567"),
  "username": "ntdhue",
  "password": "986d0868a5143a42d67cfbee89335000",
  "roles": NumberLong(4),
  "person": "Nguyễn Thị Diệu Huệ"
});
db.getCollection("users").insert({
  "_id": ObjectId("542a01085c1e8825048b4567"),
  "username": "vvvang",
  "password": "97c684bb35f403484cc7316e372a4023",
  "roles": NumberLong(4),
  "person": "Võ Văn Vàng"
});
db.getCollection("users").insert({
  "_id": ObjectId("55598e6c5c1e8815058b4568"),
  "username": "thngoc",
  "password": "19c3c43653993b0ed5cd76f2394ab9c1",
  "roles": NumberLong(4),
  "person": "Truong Hoa Ngoc"
});
db.getCollection("users").insert({
  "_id": ObjectId("55598ef05c1e8818058b4567"),
  "username": "dhluc",
  "password": "42ea217dfb3b5e114ee79390c54b944d",
  "roles": NumberLong(4),
  "person": "Doan Huu Luc"
});
db.getCollection("users").insert({
  "_id": ObjectId("55598f0c5c1e88ba068b4567"),
  "username": "vtnhiem",
  "password": "4e25c6c4cf7a4c61ed115af58acc7895",
  "roles": NumberLong(4),
  "person": "Vo Thi Nhiem"
});
