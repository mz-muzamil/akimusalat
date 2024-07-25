jQuery(document).ready(function ($) {
  $(".home-banner").owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    dots: false,
    autoplay: true,
    navText: [
      "<i class='fa-solid fa-angle-left'></i>",
      "<i class='fa-solid fa-angle-right'></i>",
    ],
  });

  $("#shop-now-button").on("click", function (event) {
    event.preventDefault();
    window.location.href = my_vars.checkout_url;
  });

  $(".testimonials_slider").owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay: true,
    navText: [
      "<i class='fa-solid fa-angle-left'></i>",
      "<i class='fa-solid fa-angle-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      400: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 2,
      },
      1200: {
        items: 2,
      },
    },
  });

  function checkEmptyFields() {
    const name = $("#name").val().trim();
    const email = $("#email").val().trim();
    const message = $("#message").val().trim();
    return name !== "" && email !== "" && message !== "";
  }

  $("#name").on("input", function () {
    const name = $(this).val().trim();
    if (name !== "") {
      $("#message").val(`Hi, my name is ${name}`);
    } else {
      $("#message").val("");
    }
  });

  $("#btn_submit").on("click", function (event) {
    if (!checkEmptyFields()) {
      event.preventDefault();
      if (!$("#name").val().trim()) {
        $("#name")
          .tooltip({ title: "Name is required", placement: "top" })
          .tooltip("show");
      }
      if (!$("#email").val().trim()) {
        $("#email")
          .tooltip({ title: "Email is required", placement: "top" })
          .tooltip("show");
      }
      if (!$("#message").val().trim()) {
        $("#message")
          .tooltip({ title: "Message is required", placement: "top" })
          .tooltip("show");
      }
    }
  });
  $('[data-toggle="tooltip"]').tooltip();
});
