function cropImg(id) {
  $(`#${id}`).ijaboCropTool({
    preview: ".image-previewer",
    setRatio: 1,
    allowedExtensions: ["jpg", "jpeg", "png"],
    buttonsText: ["CROP", "QUIT"],
    buttonsColor: ["#30bf7d", "#ee5155", -15],
    processUrl: '{{ route("crop") }}',
    withCSRF: ["_token", "{{ csrf_token() }}"],
    onSuccess: function (message, element, status) {
      alert(message);
    },
    onError: function (message, element, status) {
      alert(message);
    },
  });
}
