//      ------            //\\                  -----     ------------   -           |          -------
//     /                 //  \\                /                |         \          |         /
//    /                 //    \\              /                 |          |         |        /
//   /                 //      \\            /                  |          |         |        |
//  /                 //        \\          /                   |          |         |         \--------/
//  |                //----------\\         |                   |          |         |                  |
//  \               //            \\        \                   |          |         |                 /
//   \             //              \\        \                  |          |         |                /
//    \           //                \\        \                 |           \        |               /
//     \         //                  \\        \                |            \       |  /           /
//      ------  //                    \\        ------          |             \---------      ------

//-------------------------------------------------------------------------------------------

//            //\\       ---------        //\\          \\  //
//           //  \\              |       //  \\          \\//
//          //----\\             |      //----\\          //
//         //      \\           /      //      \\        //\\
//        //        \\   -------      //        \\      //  \\

// Call Cgi file and print the value returned from it in an element
function CGI_call(path, element) 
{
    var myRequest = new XMLHttpRequest();
    myRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById(element).innerHTML = this.responseText;
            }
    };
    myRequest.open("GET", path);
    myRequest.addEventListener("load", function() { console.log(this) } );
    myRequest.send();
}

function CGI_call_post(path, element, data) 
{
    if(data == "")
    {    
        var myRequest = new XMLHttpRequest();
        myRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById(element).innerHTML = this.responseText;
            }
        };
        myRequest.open("GET", path);
        myRequest.addEventListener("load", function() { console.log(this) } );
        myRequest.send();
    }
    else
    {
        var myRequest = new XMLHttpRequest();
        var url = path;
        var parameter = data;
        
        myRequest.open("POST", url, true);
        myRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        myRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById(element).innerHTML = this.responseText;
            }
        };
        myRequest.send(parameter);
    }
}

function CGI_call_post_cb(path, element, data, callback) 
{
    if(data == "")
    {    
        var myRequest = new XMLHttpRequest();
        myRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById(element).innerHTML = this.responseText;
                callback();
            }
        };
        myRequest.open("GET", path);
        myRequest.addEventListener("load", function() { console.log(this) } );
        myRequest.send();
    }
    else
    {
        var myRequest = new XMLHttpRequest();
        var url = path;
        var parameter = data;
        
        myRequest.open("POST", url, true);
        myRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        myRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById(element).innerHTML = this.responseText;
                callback();
            }
        };
        myRequest.send(parameter);
    }
}

function POST_request(parameter, url)
{
    var request = new XMLHttpRequest();
    
    request.open("POST", url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(parameter);
}

//used to create Sessions/Cookies with expiration
function CookieExpireSec(name, value, sec)
{
    var date = new Date();
    date.setTime(date.getTime() + (sec*1000));
    var expires = "; expires=" + date.toGMTString();

    document.cookie = name+ "=" + value+expires + "; path=/";
}



//      ||----        ----     ||          ||
//      ||     \     /    \    ||\\      //||
//      ||      |   |      |   || \\    // ||
//      ||     /     \    /    ||  \\  //  ||
//      ||-----       ----     ||   \\//   ||

class StaticHTMLElement
{
    constructor(html_el) 
    {
        this.html_el = document.createElement(html_el);
    }
    
    set_id(ID) { this.html_el.setAttribute("id", ID); }
    set_name(Name) { this.html_el.setAttribute("name", Name); }
    set_class(Class) { this.html_el.setAttribute("class", Class); }
    set_accesskey(AccessKey) { this.html_el.setAttribute("accesskey", AccessKey); }
    set_autocapitalize(Auto) { this.html_el.setAttribute("autocapitalize", Auto); }
    set_contenteditable(Contenteditable) { this.html_el.setAttribute("contenteditable", Contenteditable); }
    set_contextmenu(Contextmenu) { this.html_el.setAttribute("contextmenu", Contextmenu); }
    set_dir(DIR) { this.html_el.setAttribute("dir", DIR); }
    set_draggable(Draggable) { this.html_el.setAttribute("draggable", Draggable); }
    set_dropzone(Dropzone) { this.html_el.setAttribute("dropzone", Dropzone); }
    set_hidden(Hidden) { this.html_el.setAttribute("hidden", Hidden); }
    set_inputmode(InputMode) { this.html_el.setAttribute("inputmode", InputMode); }
    set_is(IS) { this.html_el.setAttribute("is", IS); }
    set_itemid(ItemID) { this.html_el.setAttribute("itemid", ItemID); }
    set_itemprop(ItemProp) { this.html_el.setAttribute("itemprop", ItemProp); }
    set_itemref(ItemRef) { this.html_el.setAttribute("itemref", ItemRef); }
    set_itemscope(ItemScope) { this.html_el.setAttribute("itemscope", ItemScope); }
    set_itemtype(ItemType) { this.html_el.setAttribute("itemtype", ItemType); }
    set_lang(Lang) { this.html_el.setAttribute("lang", Lang); }
    set_slot(Slot) { this.html_el.setAttribute("slot", Slot); }
    set_spellcheck(SpellCheck) { this.html_el.setAttribute("spellcheck", SpellCheck); }
    set_style(Style) { this.html_el.setAttribute("style", Style); }
    set_tabindex(TabIndex) { this.html_el.setAttribute("tabindex", TabIndex); }
    set_title(Title) { this.html_el.setAttribute("title", Title); }
    set_translate(Translate) { this.html_el.setAttribute("translate", Translate); }
    set_accept(Accept) { this.html_el.setAttribute("accept", Accept); }
    set_acceptcharset(Acceptcharset) { this.html_el.setAttribute("acceptcharset", Acceptcharset); }
    set_action(Actiom) { this.html_el.setAttribute("action", Action); }
    set_align(Align) { this.html_el.setAttribute("align", Align); }
    set_allow(Allow) { this.html_el.setAttribute("allow", Allow); }
    set_alt(Alt) { this.html_el.setAttribute("alt", Alt); }
    set_autocompletence(Autocompletence) { this.html_el.setAttribute("autocompletence", Autocompletence); }
    set_autofocus(Autofocus) { this.html_el.setAttribute("autofocus", Autofocus); }
    set_autoplay(Autoplay) { this.html_el.setAttribute("autoplay", Autoplay); }
    set_bgcolor(Bgcolor) { this.html_el.setAttribute("bgcolor", Bgcolor); }
    set_buffered(Buffered) { this.html_el.setAttribute("buffered", Buffered); }
    set_challenge(Challenge) { this.html_el.setAttribute("challenge", Challenge); }
    set_charset(Charset) { this.html_el.setAttribute("charset", Charset); }
    set_checked(Checked) { this.html_el.setAttribute("checked", Checked); }
    set_cite(Cite) { this.html_el.setAttribute("cite", Cite); }
    set_code(Code) { this.html_el.setAttribute("code", Code); }
    set_codebase(Codebase) { this.html_el.setAttribute("codebase", Codebase); }
    set_color(Color) { this.html_el.setAttribute("color", Color); }
    set_cols(Cols) { this.html_el.setAttribute("cols", Cols); }
    set_colspan(Colspan) { this.html_el.setAttribute("colspan", Colspan); }
    set_content(Content) { this.html_el.setAttribute("content", Content); }
    set_controls(Controls) { this.html_el.setAttribute("controls", Controls); }
    set_coords(Coords) { this.html_el.setAttribute("coords", Coords); }
    set_crossorigin(Crossorigin) { this.html_el.setAttribute("crossorigin", Crossorigin); }
    set_csp(Csp) { this.html_el.setAttribute("csp", Csp); }
    set_data(Data) { this.html_el.setAttribute("data", Data); }
    set_datetime(Datetime) { this.html_el.setAttribute("datetime", Datetime); }
    set_decoding(Decoding) { this.html_el.setAttribute("decoding", Decoding); }
    set_default(Default) { this.html_el.setAttribute("default", Default); }
    set_defer(Defer) { this.html_el.setAttribute("defer", Defer); }
    set_dirname(Dirname) { this.html_el.setAttribute("dirname", Dirname); }
    set_disabled(Disabled) { this.html_el.setAttribute("disabled", Disabled); }
    set_download(Download) { this.html_el.setAttribute("download", Download); }
    set_enctype(Enctype) { this.html_el.setAttribute("enctype", Enctype); }
    set_for(For) { this.html_el.setAttribute("for", For); }
    set_form(Form) { this.html_el.setAttribute("form", Form); }
    set_formaction(Formaction) { this.html_el.setAttribute("formaction", Formaction); }
    set_headers(Headers) { this.html_el.setAttribute("headers", Headers); }
    set_height(Height) { this.html_el.setAttribute("height", Height); }
    set_high(High) { this.html_el.setAttribute("high", High); }
    set_href(Href) { this.html_el.setAttribute("href", Href); }
    set_hreflang(Hreflang) { this.html_el.setAttribute("hreflang", Hreflang); }
    set_icon(Icon) { this.html_el.setAttribute("icon", Icon); }
    set_importance(Importance) { this.html_el.setAttribute("importance", Importance); }
    set_integrity(Integrity) { this.html_el.setAttribute("integrity", Integrity); }
    set_ismap(Ismap) { this.html_el.setAttribute("ismap", Ismap); }
    set_keytype(Keytype) { this.html_el.setAttribute("keytype", Keytype); }
    set_kind(Kind) { this.html_el.setAttribute("kind", Kind); }
    set_label(Label) { this.html_el.setAttribute("label", Label); }
    set_language(Language) { this.html_el.setAttribute("language", Language); }
    set_lazyload(Lazyload) { this.html_el.setAttribute("lazyload", Lazyload); }
    set_list(List) { this.html_el.setAttribute("list", List); }
    set_loop(Loop) { this.html_el.setAttribute("loop", Loop); }
    set_low(Low) { this.html_el.setAttribute("low", Low); }
    set_manifest(Manifest) { this.html_el.setAttribute("manifest", Manifest); }
    set_max(Max) { this.html_el.setAttribute("max", Max); }
    set_maxlenght(Maxlenght) { this.html_el.setAttribute("maxlenght", Maxlenght); }
    set_minilenght(Minilenght) { this.html_el.setAttribute("minilenght", Minilenght); }
    set_media(Media) { this.html_el.setAttribute("media", Media); }
    set_method(Method) { this.html_el.setAttribute("mathod", Method); }
    set_min(Min) { this.html_el.setAttribute("min", Min); }
    set_multiple(Multiple) { this.html_el.setAttribute("multiple", Multiple); }
    set_muted(Muted) { this.html_el.setAttribute("muted", Muted); }
    set_novalidate(Novalidate) { this.html_el.setAttribute("novalidate", Novalidate); }
    set_open(Open) { this.html_el.setAttribute("open", Open); }
    set_optimum(Optimum) { this.html_el.setAttribute("optimum", Optimum); }
    set_pattern(Pattern) { this.html_el.setAttribute("pattern", Pattern); }
    set_ping(Ping) { this.html_el.setAttribute("ping", Ping); }
    set_placeholder(Placeholder) { this.html_el.setAttribute("placeholder", Placeholder); }
    set_poster(Poster) { this.html_el.setAttribute("poster", Poster); }
    set_preload(Preload) { this.html_el.setAttribute("preload", Preload); }
    set_radiogroup(Radiogroup) { this.html_el.setAttribute("radiogroup", Radiogroup); }
    set_readonly(Reandonly) { this.html_el.setAttribute("reandonly", Reandonly); }
    set_referrerpolicy(Referrerpolicy) { this.html_el.setAttribute("Referrerpolicy", Referrerpolicy); }
    set_rel(Rel) { this.html_el.setAttribute("rel", Rel); }
    set_required(Required) { this.html_el.setAttribute("required", Required); }
    set_reversed(Reversed) { this.html_el.setAttribute("reversed", Reversed); }
    set_rows(Rows) { this.html_el.setAttribute("rows", Rows); }
    set_rowspan(Rowspan) { this.html_el.setAttribute("rowspan", Rowspan); }
    set_sandbox(Sandbox) { this.html_el.setAttribute("sandbox", Sandbox); }
    set_scope(Scope) { this.html_el.setAttribute("scope", Scope); }
    set_scoped(Scoped) { this.html_el.setAttribute("scoped", Scoped); }
    set_selected(Selected) { this.html_el.setAttribute("selected", Selected); }
    set_shape(Shape) { this.html_el.setAttribute("shape", Shape); }
    set_size(Size) { this.html_el.setAttribute("size", Size); }
    set_sizes(Sizes) { this.html_el.setAttribute("sizes", Sizes); }
    set_span(Span) { this.html_el.setAttribute("span", Span); }
    set_spellcheck(Spellcheck) { this.html_el.setAttribute("spellcheck", Spellcheck); }
    set_src(Src) { this.html_el.setAttribute("src", Src); }
    set_srcdoc(Srcdoc) { this.html_el.setAttribute("srcdoc", Srcdoc); }
    set_srclang(Srclang) { this.html_el.setAttribute("srclang", Srclang); }
    set_srcset(Srcset) { this.html_el.setAttribute("srcset", Srcset); }
    set_start(Start) { this.html_el.setAttribute("start", Start); }
    set_step(Step) { this.html_el.setAttribute("step", Step); }
    set_summary(Summary) { this.html_el.setAttribute("summary", Summary); }
    set_target(Target) { this.html_el.setAttribute("target", Target); }
    set_type(Type) { this.html_el.setAttribute("type", Type); }
    set_usemap(Usemap) { this.html_el.setAttribute("usemap", Usemap); }
    set_value(Value) { this.html_el.setAttribute("value", Value); }
    set_width(Width) { this.html_el.setAttribute("width", Width); }
    set_wrap(Wrap) { this.html_el.setAttribute("wrap", Wrap); }
    //
    set_onabort(OnAbort) { this.html_el.setAttribute("onabort", OnAbort); }
    set_onautocomplete(Onautocomplete) { this.html_el.setAttribute("onautocomplete", Onautocomplete); }
    set_onautocompleteerror(Onautocompleteerror) { this.html_el.setAttribute("onautocompleteerror", Onautocompleteerror); }
    set_onblur(Onblur) { this.html_el.setAttribute("onblur", Onblur); }
    set_oncancel(Oncancel) { this.html_el.setAttribute("oncancel", Oncancel); } 
    set_oncanplay(Oncanplay) { this.html_el.setAttribute("oncanplay", Oncanplay); }
    set_oncanplaythrough(Oncanplaythrough) { this.html_el.setAttribute("oncanplaythrough", Oncanplaythrough); }
    set_onchange(Onchange) { this.html_el.setAttribute("onchange", Onchange); }
    set_onclick(Onclick) { this.html_el.setAttribute("onclick", Onclick); }
    set_onclose(Onclose) { this.html_el.setAttribute("onclose", Onclose); }
    set_oncontextmenu(Oncontextmenu) { this.html_el.setAttribute("oncontextmenu", Oncontextmenu); }
    set_oncuechange(Oncuechange) { this.html_el.setAttribute("oncuechange", Oncuechange); }
    set_ondblclick(Ondblclick) { this.html_el.setAttribute("ondblclick", Ondblclick); }
    set_ondrag(Ondrag) { this.html_el.setAttribute("ondrag", Ondrag); }
    set_ondragend(Ondragend) { this.html_el.setAttribute("ondragend", Ondragend); }
    set_ondragenter(Ondragenter) { this.html_el.setAttribute("ondragenter", Ondragenter); }
    set_ondragexit(Ondragexit) { this.html_el.setAttribute("ondragexit", Ondragexit); }
    set_ondragleave(Ondragleave) { this.html_el.setAttribute("ondragleave", Ondragleave); }
    set_ondragover(Ondragover) { this.html_el.setAttribute("ondragover", Ondragover); }
    set_ondragstart(Ondragstart) { this.html_el.setAttribute("ondragstart", Ondragstart); }
    set_ondrop(Ondrop) { this.html_el.setAttribute("ondrop", Ondrop); }
    set_ondurationchange(Ondurationchange) { this.html_el.setAttribute("ondurationchange", Ondurationchange); }
    set_onemptied(Onemptied) { this.html_el.setAttribute("onemptied", Onemptied); }
    set_onended(Onended) { this.html_el.setAttribute("onended", Onended); }
    set_onerror(Onerror) { this.html_el.setAttribute("onerror", Onerror); }
    set_onfocus(Onfocus) { this.html_el.setAttribute("onfocus", Onfocus); }
    set_oninput(Oninput) { this.html_el.setAttribute("oninput", Oninput); }
    set_oninvalid(Oninvalid) { this.html_el.setAttribute("oninvalid", Oninvalid); }
    set_onkeydown(Onkeydown) { this.html_el.setAttribute("onkeydown", Onkeydown); }
    set_onkeypress(Onkeypress) { this.html_el.setAttribute("onkeypress", Onkeypress); }
    set_onkeyup(Onkeyup) { this.html_el.setAttribute("onkeyup", Onkeyup); }
    set_onload(Onload) { this.html_el.setAttribute("onload", Onload); }
    set_onloadeddata(Onloadeddata) { this.html_el.setAttribute("onloadeddata", Onloadeddata); }
    set_onloadedmetadata(Onloadedmetadata) { this.html_el.setAttribute("onloadedmetadata", Onloadedmetadata); }
    set_onloadstart(Onloadstart) { this.html_el.setAttribute("onloadstart", Onloadstart); }
    set_onmousedown(Onmousedown) { this.html_el.setAttribute("onmousedown", Onmousedown); }
    set_onmouseenter(Onmouseenter) { this.html_el.setAttribute("onmouseenter", Onmouseenter); }
    set_onmouseleave(Onmouseleave) { this.html_el.setAttribute("onmouseleave", Onmouseleave); }
    set_onmousemove(Onmousemove) { this.html_el.setAttribute("onmousemove", Onmousemove); }
    set_onmouseout(Onmouseout) { this.html_el.setAttribute("onmouseout", Onmouseout); }
    set_onmouseover(Onmouseover) { this.html_el.setAttribute("onmouseover", Onmouseover); }
    set_onmouseup(Onmouseup) { this.html_el.setAttribute("onmouseup", Onmouseup); }
    set_onmousewheel(Onmousewheel) { this.html_el.setAttribute("onmousewheel", Onmousewheel); }
    set_onpause(Onpause) { this.html_el.setAttribute("onpause", Onpause); }
    set_onplay(Onplay) { this.html_el.setAttribute("onplay", Onplay); }
    set_onplaying(Onplaying) { this.html_el.setAttribute("onplaying", Onplaying); }
    set_onprogress(Onprogress) { this.html_el.setAttribute("onprogress", Onprogress); }
    set_onratechange(Onratechange) { this.html_el.setAttribute("onratechange", Onratechange); }
    set_onreset(Onreset) { this.html_el.setAttribute("onreset", Onreset); }
    set_onresize(Onresize) { this.html_el.setAttribute("onresize", Onresize); }
    set_onscroll(Onscroll) { this.html_el.setAttribute("onscroll", Onscroll); }
    set_onseeked(Onseeked) { this.html_el.setAttribute("onseeked", Onseeked); }
    set_onseeking(Onseeking) { this.html_el.setAttribute("onseeking", Onseeking); }
    set_onselect(Onselect) { this.html_el.setAttribute("onselect", Onselect); }
    set_onshow(Onshow) { this.html_el.setAttribute("onshow", Onshow); }
    set_onsort(Onsort) { this.html_el.setAttribute("onsort", Onsort); }
    set_onstalled(Onstalled) { this.html_el.setAttribute("onstalled", Onstalled); }
    set_onsubmit(Onsubmit) { this.html_el.setAttribute("onsubmit", Onsubmit); }
    set_onsuspend(Onsuspend) { this.html_el.setAttribute("onsuspend", Onsuspend); }
    set_ontimeupdate(Ontimeupdate) { this.html_el.setAttribute("ontimeupdate", Ontimeupdate); }
    set_ontoggle(Ontoggle) { this.html_el.setAttribute("ontoggle", Ontoggle); }
    set_onvolumechange(Onvolumechange) { this.html_el.setAttribute("onvolumechange", Onvolumechange); }
    set_onwaiting(Onwaiting) { this.html_el.setAttribute("onwaiting", Onwaiting); }
    
    get id() { return this.html_el.id; }
    get name() { return this.html_el.name; }
    get class() { return this.html_el.class; }
    get accesskey() { return this.html_el.accesskey; }
    get autocapitalize() { return this.html_el.autocapitalize; }
    get contenteditable() { return this.html_el.contenteditable; }
    get contextmenu() { return this.html_el.contextmenu; }
    get dir() { return this.html_el.dir; }
    get draggable() { return this.html_el.draggable; }
    get dropzone() { return this.html_el.dropzone; }
    get hidden() { return this.html_el.hidden; }
    get inputmode() { return this.html_el.inputmode; }
    get is() { return this.html_el.is; }
    get itemid() { return this.html_el.itemid; }
    get itemprop() { return this.html_el.itemprop; }
    get itemref() { return this.html_el.itemref; }
    get itemscope() { return this.html_el.itemscope; }
    get itemtype() { return this.html_el.itemtype; }
    get lang() { return this.html_el.lang; }
    get slot() { return this.html_el.slot; }
    get spellcheck() { return this.html_el.spellcheck; }
    get style() { return this.html_el.style; }
    get tabindex() { return this.html_el.tabindex; }
    get title() { return this.html_el.title; }
    get translate() { return this.html_el.translate; }
    get accept() { return this.html_el.accept; }
    get acceptcharset() { return this.html_el.acceptcharset; }
    get action() { return this.html_el.action; }
    get align() { return this.html_el.align; }
    get allow() { return this.html_el.allow; }
    get alt() { return this.html_el.alt; }
    get autocompletence() { return this.html_el.autocompletence; }
    get autofocus() { return this.html_el.autofocus; }
    get autoplay() { return this.html_el.autoplay; }
    get bgcolor() { return this.html_el.bgcolor; }
    get buffered() { return this.html_el.buffered; }
    get challenge() { return this.html_el.challenge; }
    get charset() { return this.html_el.charset; }
    get checked() { return this.html_el.checked; }
    get cite() { return this.html_el.cite; }
    get code() { return this.html_el.code; }
    get codebase() { return this.html_el.codebase; }
    get color() { return this.html_el.color; }
    get cols() { return this.html_el.cols; }
    get colspan() { return this.html_el.colspan; }
    get content() { return this.html_el.content; }
    get controls() { return this.html_el.controls; }
    get coords() { return this.html_el.coords; }
    get crossorigin() { return this.html_el.crossorigin; }
    get csp() { return this.html_el.csp; }
    get data() { return this.html_el.data; }
    get datetime() { return this.html_el.datetime; }
    get decoding() { return this.html_el.decoding; }
    get default() { return this.html_el.default; }
    get defer() { return this.html_el.defer; }
    get dirname() { return this.html_el.dirname; }
    get disabled() { return this.html_el.disabled; }
    get download() { return this.html_el.download; }
    get enctype() { return this.html_el.enctype; }
    get for() { return this.html_el.for; }
    get form() { return this.html_el.form; }
    get formaction() { return this.html_el.formaction; }
    get headers() { return this.html_el.headers; }
    get height() { return this.html_el.height; }
    get high() { return this.html_el.high; }
    get href() { return this.html_el.href; }
    get hreflang() { return this.html_el.hreflang; }
    get icon() { return this.html_el.icon; }
    get importance() { return this.html_el.importance; }
    get integrity() { return this.html_el.integrity; }
    get ismap() { return this.html_el.ismap; }
    get keytype() { return this.html_el.keytype; }
    get kind() { return this.html_el.kind; }
    get label() { return this.html_el.label; }
    get language() { return this.html_el.language; }
    get lazyload() { return this.html_el.lazyload; }
    get list() { return this.html_el.list; }
    get loop() { return this.html_el.lopp; }
    get low() { return this.html_el.low; }
    get manifest() { return this.html_el.manifest; }
    get max() { return this.html_el.max; }
    get maxlenght() { return this.html_el.maxlenght; }
    get minilenght() { return this.html_el.minilenght; }
    get media() { return this.html_el.media; }
    get method() { return this.html_el.method; }
    get min() { return this.html_el.min; }
    get multiple() { return this.html_el.multiple; }
    get muted() { return this.html_el.muted; }
    get novalidate() { return this.html_el.novalidate; }
    get open() { return this.html_el.open; }
    get optimum() { return this.html_el.optimum; }
    get pattern() { return this.html_el.pattern; }
    get ping() { return this.html_el.ping; }
    get placeholder() { return this.html_el.placeholder; }
    get poster() { return this.html_el.poster; }
    get preload() { return this.html_el.preload; }
    get radiogroup() { return this.html_el.rediogroup; }
    get readonly() { return this.html_el.readonly; }
    get referrerpolicy() { return this.html_el.referrerpolicy; }
    get rel() { return this.html_el.rel; }
    get required() { return this.html_el.required; }
    get reversed() { return this.html_el.reversed; }
    get rows() { return this.html_el.rows; }
    get rowspan() { return this.html_el.rowspan; }
    get sandbox() { return this.html_el.sandbox; }
    get scope() { return this.html_el.scope; }
    get scoped() { return this.html_el.scoped; }
    get selected() { return this.html_el.selected; }
    get shape() { return this.html_el.shape; }
    get size() { return this.html_el.size; }
    get sizes() { return this.html_el.sizes; }
    get span() { return this.html_el.span; }
    get spellcheck() { return this.html_el.spellcheck; }
    get src() { return this.html_el.src; }
    get srcdoc() { return this.html_el.srcdoc; }
    get srclang() { return this.html_el.srclang; }
    get srcset() { return this.html_el.srcset; }
    get start() { return this.html_el.step; }
    get step() { return this.html_el.step; }
    get summary() { return this.html_el.summary; }
    get target() { return this.html_el.target; }
    get type() { return this.html_el.type; }
    get usemap() { return this.html_el.usemap; }
    get onabort() { return this.html_el.onabort; }
    get onautocomplete() { return this.html_el.onautocomplete; }
    get onautocompleteerror() { return this.html_el.onautocompleteerror; }
    get onblur() { return this.html_el.onblur; }
    get oncancel() { return this.html_el.oncancel; }
    get oncanplay() { return this.html_el.oncanplay; }
    get oncanplaythrough() { return this.html_el.oncanplaythrough; }
    get onchange() { return this.html_el.onchange; }
    get onclick() { return this.html_el.onclick; }
    get onclose() { return this.html_el.onclose; }
    get oncontextmenu() { return this.html_el.oncontextmenu; }
    get oncuechange() { return this.html_el.oncuechange; }
    get ondblclick() { return this.html_el.ondblclick; }
    get ondrag() { return this.html_el.ondrag; }
    get ondragend() { return this.html_el.ondragend; }
    get ondragenter() { return this.html_el.ondragenter; }
    get ondragexit() { return this.html_el.ondragexit; }
    get ondragleave() { return this.html_el.ondragleave; }
    get ondragover() { return this.html_el.ondragover; }
    get ondragstart() { return this.html_el.ondragstart; }
    get ondrop() { return this.html_el.ondrop; }
    get ondurationchange() { return this.html_el.ondurationchange; }
    get onemptied() { return this.html_el.onemptied; }
    get onended() { return this.html_el.onended; }
    get onerror() { return this.html_el.onerror; }
    get onfocus() { return this.html_el.onfocus; }
    get oninput() { return this.html_el.oninput; }
    get oninvalid() { return this.html_el.oninvalid; }
    get onkeydown() { return this.html_el.onkeydown; }
    get onkeypress() { return this.html_el.onkeypress; }
    get onkeyup() { return this.html_el.onkeyup; }
    get onload() { return this.html_el.onload; }
    get onloadeddata() { return this.html_el.onloadeddata; }
    get onloadedmetadata() { return this.html_el.onloadedmetadata; }
    get onloadstart() { return this.html_el.onloadstart; }
    get onmousedown() { return this.html_el.onmousedown; }
    get onmouseenter() { return this.html_el.onmouseenter; }
    get onmouseleave() { return this.html_el.onmouseleave; }
    get onmousemove() { return this.html_el.onmousemove; }
    get onmouseout() { return this.html_el.onmouseout; }
    get onmouseover() { return this.html_el.onmouseover; }
    get onmouseup() { return this.html_el.onmouseup; }
    get onmousewheel() { return this.html_el.onmousewheel; }
    get onpause() { return this.html_el.onpause; }
    get onplay() { return this.html_el.onplay; }
    get onplaying() { return this.html_el.onplaying; }
    get onprogress() { return this.html_el.onprogress; }
    get onratechange() { return this.html_el.onratechange; }
    get onreset() { return this.html_el.onreset; }
    get onresize() { return this.html_el.onresize; }
    get onscroll() { return this.html_el.onscroll; }
    get onseeked() { return this.html_el.onseeked; }
    get onseeking() { return this.html_el.onseeking; }
    get onselect() { return this.html_el.onselect; }
    get onshow() { return this.html_el.onshow; }
    get onsort() { return this.html_el.onsort; }
    get onstalled() { return this.html_el.onstalled; }
    get onsubmit() { return this.html_el.onsubmit; }
    get onsuspend() { return this.html_el.onsuspend; }
    get ontimeupdate() { return this.html_el.ontimeupdate; }
    get ontoggle() { return this.html_el.ontoggle; }
    
    appendElementById(ID) { document.getElementById(ID).appendChild(this.html_el); }
}

//      ||----      ||          ||      ----
//      ||     \    ||\\      //||     /
//      ||      |   || \\    // ||     \---\
//      ||     /    ||  \\  //  ||         /          
//      ||-----     ||   \\//   ||     ----



//      ----
//     /    \
//    |      |
//     \    /
//      ----

function CurrentDate()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) 
    {
        dd = '0' + dd;
    }

    if (mm < 10) 
    {
        mm = '0' + mm;
    }

    today = yyyy + '/' + mm + '/' + dd;
    
    return today;
}

function CurrentMonth()
{
    var today = new Date();
    var mm = today.getMonth() + 1;

    if (mm < 10) 
    {
        mm = '0' + mm;
    }

    today = mm;
    
    return today;
}

function CurrentDay()
{
    var today = new Date();
    var dd = today.getDate();

     if (dd < 10) 
    {
        dd = '0' + dd;
    }

    today = dd;
    
    return today;
}

function CurrentYear()
{
    var today = new Date();
    var yyyy = today.getFullYear();

    today = yyyy;
    
    return today;
}