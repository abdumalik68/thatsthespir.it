(window.webpackJsonpthatsthespirit=window.webpackJsonpthatsthespirit||[]).push([[0],{101:function(e,t,a){},102:function(e,t,a){"use strict";a.r(t);var n=a(4),l=a(5),r=a(8),o=a(6),s=a(10),c=a(9),i=a(0),u=a.n(i),m=a(20),h=a.n(m),d=a(11),p=a(43),g=a.n(p),f=a(44),E=a.n(f),b=a(45),v=a.n(b),y=a(46),w=a.n(y),O=a(104),j=a(105),N=a(106),k=a(22),q=a.n(k),S=q.a.create({baseURL:"http://localhost:8000/v1/",responseType:"json"}),A=function(e){var t=e.overlay,a=void 0===t||t,n=e.children;return a?u.a.createElement("div",{className:"Loader"},u.a.createElement("div",{className:"overlay"},u.a.createElement("div",{className:"loading-message"},u.a.createElement("div",{className:"spinner"}),u.a.createElement("div",{className:"loading-message-text"},n)))):u.a.createElement("div",{className:"Loader"},u.a.createElement("div",{className:"loading-message"},u.a.createElement("div",{className:"spinner"}),u.a.createElement("div",{className:"loading-message-text"},n)))},C=a(47),D=a.n(C),x=function(e){return D.a.decode("".concat(e.fullname," - ").concat(e.value))},I=function(e,t){var a=t.query,n=e.value,l=E()(n,a),r=v()(n,l);return u.a.createElement("div",{className:"quote-preview"},u.a.createElement("span",{className:"quote-preview-author"},e.photo?u.a.createElement("img",{alt:"",className:"tinythumb",src:"https://thatsthespir.it/uploads/".concat(e.photo)}):null,e.fullname),u.a.createElement("span",{className:"quote-preview-quote"}," \u2013",r.map((function(e,t){var a=e.highlight?"highlight":null;return u.a.createElement("span",{className:a,key:t},e.text.replace(/<[^>]+>/g,""))}))))},P=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).onChange=function(e,t){var n=t.newValue;t.method;a.setState({value:n})},a.onSuggestionSelectedHandler=function(e,t){var n=t.suggestion;t.suggestionValue,t.suggestionIndex,t.sectionIndex,t.method;a.props.setQuoteHandler(n),Object(d.c)("/"+n.url),a.setState({value:""})},a.onSuggestionsFetchRequested=function(e){var t=e.value;t.length>3&&(a.setState({loading:!0}),S.get("https://api.thatsthespir.it/v1/quotes/search?query=".concat(t)).then((function(e){return e.data.suggestions})).then((function(e){a.setState({suggestions:e,loading:!1})})).catch((function(e){return console.log(e),null})))},a.onSuggestionsClearRequested=function(){a.setState({suggestions:[],loading:void 0,value:""})},a.inputReference=function(e){null!==e&&(a.input=e.input)},a.state={value:"",suggestions:[],loading:void 0},a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){var e=this,t=this.state,a=t.value,n=t.suggestions,l={placeholder:"Search for a quote or author name",value:a,onChange:this.onChange};return u.a.createElement("section",{className:"search"},u.a.createElement(w.a,{handleKeys:["ctrl+f"],onKeyEvent:function(t,a){return e.input.focus()}}),u.a.createElement(O.a,{className:"content"},u.a.createElement(j.a,null,u.a.createElement(N.a,{xs:12},this.state.loading?u.a.createElement(A,{overlay:"false"},"Searching..."):null,u.a.createElement("h1",{className:"ui-title topline"},"search"),u.a.createElement(g.a,{ref:this.inputReference,suggestions:n,onSuggestionsFetchRequested:this.onSuggestionsFetchRequested,onSuggestionsClearRequested:this.onSuggestionsClearRequested,onSuggestionSelected:this.onSuggestionSelectedHandler,getSuggestionValue:x,renderSuggestion:I,inputProps:l})))))}}]),t}(u.a.Component),T=a(23);function L(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function _(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?L(a,!0).forEach((function(t){Object(T.a)(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):L(a).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}var H=function(e){function t(){return Object(n.a)(this,t),Object(r.a)(this,Object(o.a)(t).apply(this,arguments))}return Object(c.a)(t,e),Object(l.a)(t,[{key:"isBrowser",value:function(){return!("undefined"===typeof document||"undefined"===typeof window)}},{key:"render",value:function(){var e="/"+this.props.quote.url,t={url:e,text:this.props.quote.body},a=_({},t),n=_({},t,{imagePath:"/uploads/"+this.props.quote.photo}),l=_({},t,{title:this.props.quote.fullname}),r={url:e,total_likes:this.props.quote.total};return u.a.createElement("p",{className:"share-buttons"},u.a.createElement("a",{className:"quote-permalink",href:e},"#",this.props.quote.quote_id),u.a.createElement("span",{className:"horiz-sep"},"|"),this.props.quote.source?u.a.createElement("span",{className:"source"},u.a.createElement("a",{target:"_blank",rel:"noopener noreferrer",href:this.props.quote.source},"source"),u.a.createElement("span",{className:"horiz-sep"},"|")):null,u.a.createElement(M,{url:e}),u.a.createElement(Q,a),u.a.createElement(R,n),u.a.createElement(B,l),u.a.createElement(F,t),u.a.createElement("span",{className:"horiz-sep"},"|"),u.a.createElement(G,r))}}]),t}(i.Component),M=function(e){var t=e.url;return u.a.createElement("a",{rel:"nofollow",className:"social facebook",href:"//www.facebook.com/sharer/sharer.php?u=".concat(t),title:"Share this quote on Facebook"},u.a.createElement("img",{src:"/assets/images/facebook.svg",alt:""}))},Q=function(e){var t=e.url,a=e.text;return u.a.createElement("a",{rel:"nofollow",className:"social twitter",href:"http://twitter.com/share?text=".concat(a,"&amp;url=").concat(t,"&amp;hashtags=design_quote"),title:"Share this quote on Twitter"},u.a.createElement("img",{src:"/assets/images/twitter.svg",alt:""}))},F=function(e){var t=e.url,a=e.text;return u.a.createElement("a",{rel:"nofollow",className:"social reddit","data-height":"420","data-network":"reddit","data-width-normal":"540","data-width":"845",href:"//www.reddit.com/submit?url=".concat(t,"&amp;title=").concat(a),title:"Share this quote on Reddit"},u.a.createElement("img",{src:"/assets/images/reddit.svg",width:"19",height:"15",alt:""}))},R=function(e){var t=e.url,a=(e.text,e.imagePath);return u.a.createElement("a",{rel:"nofollow",className:"social pinterest",href:"https://pinterest.com/pin/create/button/?url=".concat(t,"&amp;media=").concat(a,"&amp;description=").concat(t),title:"Share this quote on Pinterest"},u.a.createElement("img",{src:"/assets/images/pinterest.svg",alt:""}))},B=function(e){var t=e.url,a=e.text,n=e.title;return u.a.createElement("a",{rel:"nofollow",className:"social linkedin",href:"https://www.linkedin.com/shareArticle?mini=true&amp;url=".concat(t,"&amp;title=").concat(n,"&amp;summary=").concat(a,"&amp;source=").concat(t),title:"Share this quote on LinkedIn"},u.a.createElement("img",{src:"/assets/images/linkedin.svg",alt:""}))},G=function(e){var t=e.url,a=e.total_likes;return u.a.createElement("a",{rel:"nofollow",className:"social favourite",href:"".concat(t,"#login-ui"),title:"Favourite this quote so you can easily find it later. "},u.a.createElement("em",null,"Save it ?"),u.a.createElement("span",{className:"total_likes"},a))},W=H;function V(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}var z=function(e){var t=e.showAuthor,a=e.quote,n=function(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?V(a,!0).forEach((function(t){Object(T.a)(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):V(a).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}({},a),l=n.body,r=n.fullname,o=n.author_slug,s=n.photo,c=n.total;return u.a.createElement("div",{className:"quote single-quote"},u.a.createElement("blockquote",{className:""},u.a.createElement("span",{className:"guillemets"}),u.a.createElement("span",{className:"the-quote",dangerouslySetInnerHTML:{__html:l}}),u.a.createElement("span",{className:"pilcrow"},"|")),t?u.a.createElement("div",{className:"author"},u.a.createElement("div",{className:"photo",style:s?{backgroundImage:"url(https://thatsthespir.it/uploads/".concat(s,")")}:null}),u.a.createElement("address",{className:"author"},"\u2013\xa0",u.a.createElement("a",{title:"All quotes by ".concat(r),href:"/author/".concat(o),rel:"author",className:"authorName"},r,u.a.createElement("br",null),u.a.createElement("small",{className:"meta"},c," quote",c>1?"s":null)))):null,u.a.createElement(W,{quote:a}))};function Y(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;window.scroll(0,0),e.url.substring("author/")?(this.fetchData(e.url+"?fields=quotes",t),Object(d.c)("/"+e.url,{state:{data:e}})):this.setState({data:e,loading:!1})}function J(e){var t=this,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;this.setState({loading:!0});try{if("quote/random"===e)e+="?random="+(new Date).getTime();S.get(e).then((function(e){t.setState({loading:!1,data:e.data},a)})).catch((function(e){return null}))}catch(n){alert("\ud83d\ude31 Axios request failed: ".concat(n))}}var K=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).fetchData=J.bind(Object(s.a)(a)),a.setQuoteFromSearch=Y.bind(Object(s.a)(a)),a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement(u.a.Fragment,null,u.a.createElement(z,{quote:this.props.quote,showAuthor:!0}),u.a.createElement(P,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),U=function(){return u.a.createElement(O.a,{className:"content"},u.a.createElement(j.a,null,u.a.createElement(N.a,null,u.a.createElement("h1",{className:"topline"},"A daily dose of Spirit in your mailbox to start the day?"))),u.a.createElement(j.a,null,u.a.createElement(N.a,{md:3},u.a.createElement("img",{src:"/assets/images/Screenshot_2015-06-01-23-34-00.png",alt:"",style:{maxWidth:"100%"},className:"image-drop-shadow"})),u.a.createElement(N.a,{md:9},u.a.createElement("p",null,"Receive a quote from The Spirit! in your mailbox every day in the morning. It will make you feel..."),u.a.createElement("p",null,"Mmmmmmmmmh, nice."),u.a.createElement("p",null,"Like that."),u.a.createElement("div",{id:"mc_embed_signup"},u.a.createElement("form",{action:"//pixeline.us2.list-manage.com/subscribe/post?u=47aa7bd611cb197be236cd3b2&id=8a917f2ce3",method:"post",id:"mc-embedded-subscribe-form"},u.a.createElement("div",{id:"mc_embed_signup_scroll"},u.a.createElement("div",{className:"mc-field-group"},u.a.createElement("label",null,"Your Email Address"),u.a.createElement("input",{type:"email",name:"EMAIL",className:"required email",id:"mce-EMAIL","aria-required":"true"})),u.a.createElement("p",{className:"meta"},"Powered by ",u.a.createElement("a",{href:"http://eepurl.com/N-Z79",title:"MailChimp - email marketing made easy and fun"},"MailChimp"),u.a.createElement("br",null),u.a.createElement("small",null,"(Each email contains an unsubscribe link, should this ever get annoying.)")),u.a.createElement("div",{style:{position:"absolute",left:"-5000px"}},u.a.createElement("input",{type:"text",name:"b_47aa7bd611cb197be236cd3b2_8a917f2ce3",tabIndex:"-1"})),u.a.createElement("div",{className:"clear"},u.a.createElement("input",{type:"submit",value:"Subscribe",name:"subscribe",id:"mc-embedded-subscribe",className:"button"}))))))))},Z=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).fetchData=J.bind(Object(s.a)(a)),a.setQuoteFromSearch=Y.bind(Object(s.a)(a)),a.state={data:{},loading:void 0},a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){!this.state.data.body&&this.props.quoteSlug&&this.fetchData("/quote/"+this.props.quoteSlug)}},{key:"render",value:function(){return u.a.createElement(u.a.Fragment,null,u.a.createElement(z,{quote:this.state.data,showAuthor:!0}),u.a.createElement(P,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),X=function(e){function t(){var e,a;Object(n.a)(this,t);for(var l=arguments.length,s=new Array(l),c=0;c<l;c++)s[c]=arguments[c];return(a=Object(r.a)(this,(e=Object(o.a)(t)).call.apply(e,[this].concat(s)))).stickyOnScroll=function(){var e=document.body.scrollTop||document.documentElement.scrollTop,t=document.getElementById("stickyHeader"),a=document.querySelector(".sticky--clone"),n=t.scrollHeight+200;a&&(a.classList=e>n?"sticky--clone sticky":"sticky--clone")},a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){window.addEventListener("scroll",this.stickyOnScroll)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("scroll",this.stickyOnScroll)}},{key:"render",value:function(){var e=this.props.author;return u.a.createElement(u.a.Fragment,null,u.a.createElement("header",{id:"stickyHeader"},u.a.createElement("h1",{className:"ui-title topline"},"Quotes by ",e.fullname," "),u.a.createElement("figure",{className:"author"},u.a.createElement("div",{id:"photo",className:"photo ","data-author":"{author.fullname}",style:e.photo?{backgroundImage:"url(https://thatsthespir.it/uploads/".concat(e.photo,")")}:null}),u.a.createElement("figcaption",null,e.fullname," ",u.a.createElement("br",null),u.a.createElement("small",{className:"meta contribution"},e.total," quote",e.total>1?"s":null)))),u.a.createElement("header",{className:"sticky--clone"},u.a.createElement("h1",{className:"ui-title topline"},"Quotes by ",e.fullname," "),u.a.createElement("figure",{className:"author"},u.a.createElement("div",{id:"photo",className:"photo ","data-author":"{author.fullname}",style:e.photo?{backgroundImage:"url(https://thatsthespir.it/uploads/".concat(e.photo,")")}:null}),u.a.createElement("figcaption",null,e.fullname," ",u.a.createElement("br",null),u.a.createElement("small",{className:"meta contribution"},e.total," quote",e.total>1?"s":null)))))}}]),t}(u.a.Component),$=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).state={data:{},loading:void 0},a.fetchData=J.bind(Object(s.a)(a)),a.setQuoteFromSearch=Y.bind(Object(s.a)(a)),a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){this.fetchData("/author/"+this.props.authorSlug+"?fields=quotes")}},{key:"componentWillReceiveProps",value:function(e){}},{key:"render",value:function(){var e=this.state.data.quotes;return u.a.createElement("div",{className:"content"},this.state.loading?u.a.createElement(A,null,"Mmmh, let me think..."):null,u.a.createElement("div",{id:"stickyHeaderContainer"},u.a.createElement(X,{author:this.state.data})),u.a.createElement("div",{className:"author-quotes"},e&&e.map((function(e,t){return u.a.createElement("div",{key:t},u.a.createElement(z,{quote:e,showAuthor:!1}),u.a.createElement("span",{className:"sep"},"\u292b"))}))),u.a.createElement(P,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),ee=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"Hall of Fame"))},te=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"Suggest a quote"))},ae=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"All authors"))},ne=function(){return u.a.createElement("main",{className:"privacy-policy"},u.a.createElement("h1",{className:"topline"},"Privacy Policy"),u.a.createElement("div",{className:"content"},u.a.createElement("strong",null,"Like millions of other website owners, I use Google Analytics on That's The Spirit!."),"Google Analytics is a piece of software that grabs data about my visitors (you). It\u2019s something like an advanced server log.",u.a.createElement("h2",null,"What does Google Analytics record?"),u.a.createElement("ul",null,u.a.createElement("li",null,"What website you came from to get here."),u.a.createElement("li",null,"How long you stay for."),u.a.createElement("li",null,"What kind of computer you\u2019re using."),u.a.createElement("li",null,"And quite a bit more.")),u.a.createElement("h2",null,"What do I do with your data?"),"The tracking information allows me to better understand the kind of people who come to my site and what content they\u2019re reading. This allows me to make better decisions about design and writing. Occasionally, I will compile aggregate statistics about the number of visitors this site receives and browsers being used. No personally identifying data is included in this type of reporting. All of my activity falls within the bounds of the\xa0",u.a.createElement("a",{href:"http://www.google.com/analytics/tos.html"},"Google Analytics Terms of Service"),".",u.a.createElement("strong",null,"Want to opt out of tracking?"),"You can ",u.a.createElement("a",{href:"http://www.google.com/privacy_ads.html"},"opt out of Google\u2019s advertising tracking cookie")," or ",u.a.createElement("a",{href:"http://tools.google.com/dlpage/gaoptout?hl=en"},"use a browser plugin to opt out of all Google Analytics tracking software.")))},le=a(108),re=a(107),oe=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).state={logged_in:!1,user:{}},a.refreshAfterLogin=a.refreshAfterLogin.bind(Object(s.a)(a)),a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"refreshAfterLogin",value:function(e){console.log("Child says",e),this.setState({actionCount:this.state.actionCount+1})}},{key:"render",value:function(){return u.a.createElement(O.a,{className:"header"},u.a.createElement(j.a,{className:"justify-content-between"},u.a.createElement(N.a,{xs:12,md:3,className:"col-auto mr-auto"},u.a.createElement(le.a.Brand,{as:d.a,to:"/",className:"mr-auto mt-3",onClick:this.props.homeButtonAction},"That's the spirit!",u.a.createElement("br",null),u.a.createElement("small",null,"Inspirational quotes for the creative soul."))),u.a.createElement(N.a,{xs:12,md:6,className:"col-auto"},u.a.createElement(le.a,{expand:"md",variant:"light",bg:"white",className:"pr-0"},u.a.createElement(le.a.Toggle,{"aria-controls":"responsive-navbar-nav",id:"toggle-button"}),u.a.createElement(le.a.Collapse,{id:"responsive-navbar-nav"},u.a.createElement(re.a,{as:"ul",id:"main-menu",className:"pr-0 ml-auto"},u.a.createElement(re.a.Item,{as:"li"},u.a.createElement(re.a.Link,{as:d.a,to:"/newsletter",style:{position:"relative"}},"Daily",u.a.createElement("span",{className:"badge",title:"You (will) have new mail!"},"1"))),u.a.createElement(re.a.Item,{as:"li"},u.a.createElement(re.a.Link,{as:d.a,to:"/suggest-a-quote",onClick:this.props.suggestAQuoteAction},"Suggest a Quote")),u.a.createElement(re.a.Item,{as:"li",className:"pr-0 "},u.a.createElement(re.a.Link,{as:d.a,to:"/hall-of-fame"},"Favs Chart"))))))))}}]),t}(u.a.Component),se=function(e){function t(){return Object(n.a)(this,t),Object(r.a)(this,Object(o.a)(t).apply(this,arguments))}return Object(c.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement("footer",{className:"footer"},u.a.createElement("p",null,u.a.createElement(d.a,{to:"/newsletter"},"The Spirit! by email ?")," -",u.a.createElement(d.a,{to:"/privacy-policy"},"Privacy policy")," -",u.a.createElement(d.a,{to:"/of/humans"},"All Authors")," - Made by some ",u.a.createElement("a",{href:"https://pixeline.be",title:"Brussels web agency"},"web designer in Brussels"),u.a.createElement("br",null),u.a.createElement("img",{src:"/assets/images/hand.svg",alt:"V for Victory hand sign",className:"hand"})))}}]),t}(u.a.Component),ce=function(e){function t(){var e,a;Object(n.a)(this,t);for(var l=arguments.length,s=new Array(l),c=0;c<l;c++)s[c]=arguments[c];return(a=Object(r.a)(this,(e=Object(o.a)(t)).call.apply(e,[this].concat(s)))).state={clicked:!1},a.tryToLogin=function(){a.setState({clicked:!0});a.props.provider;q.a.get("http://localhost:8000/auth?provider=".concat(a.props.provider,"&redirectTo=localhost:3000/newsletter")).then((function(e){console.log(e),a.setState({clicked:!1})}))},a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement("a",{href:this.props.url,provider:this.props.provider,className:"no-underline"},u.a.createElement("img",{alt:"",src:this.props.image}),u.a.createElement("br",null),this.props.label)}}]),t}(u.a.Component),ie=function(e){function t(){return Object(n.a)(this,t),Object(r.a)(this,Object(o.a)(t).apply(this,arguments))}return Object(c.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){}},{key:"render",value:function(){return u.a.createElement("section",{className:"modal--show",id:"login-ui",tabIndex:"-1",role:"dialog","aria-labelledby":"modal-label","aria-hidden":"true"},u.a.createElement("a",{href:"/#!",className:"modal-close",onClick:this.props.modalCloseACtion,title:"Click to close this.","data-close":"Close","data-dismiss":"modal"},"?"),u.a.createElement("div",{className:"modal-inner"},u.a.createElement("div",{className:"modal-content"},u.a.createElement("p",null,"To do that, you need to log in the Spirit via one of these services. It only takes a click and you're good to go."),u.a.createElement("ul",{className:"single-signon-providers"},u.a.createElement("li",null,u.a.createElement(ce,{url:"http://localhost:8000/auth?provider=google&redirectTo=localhost:3000/newsletter",image:"/assets/images/google.svg",provider:"google",label:"Google"})),u.a.createElement("li",null,u.a.createElement(ce,{image:"/assets/images/github.svg",provider:"github",label:"GitHub"})),u.a.createElement("li",null,u.a.createElement(ce,{image:"/assets/images/reddit.svg",provider:"reddit",label:"Reddit"})),u.a.createElement("li",null,u.a.createElement(ce,{image:"/assets/images/twitter.svg",provider:"twitter",label:"Twitter"}))))))}}]),t}(u.a.Component),ue=(a(101),function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(r.a)(this,Object(o.a)(t).call(this,e))).goHome=function(e){e.preventDefault(),a.fetchData("quote/random"),Object(d.c)("/"),window.scroll(0,0)},a.suggestAQuoteAction=function(e){a.showModal(e)},a.showModal=function(e){e.preventDefault(),document.getElementById("login-ui").setAttribute("class","modal--show is-active")},a.closeModal=function(e){e.preventDefault(),document.getElementById("login-ui").setAttribute("class","modal--show")},a.state={data:{},loading:void 0},a.goHome=a.goHome.bind(Object(s.a)(a)),a.fetchData=J.bind(Object(s.a)(a)),a}return Object(c.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){this.fetchData("quote/random")}},{key:"render",value:function(){return u.a.createElement("div",{className:"wrapper",id:"TheSpirit"},u.a.createElement(oe,{homeButtonAction:this.goHome,suggestAQuoteAction:this.suggestAQuoteAction}),u.a.createElement("div",{id:"content",className:this.state.loading?'"loading"':null},this.state.loading?u.a.createElement(A,null,"Mmmh, let me think..."):null,u.a.createElement(d.b,null,u.a.createElement(K,{path:"/",quote:this.state.data}),u.a.createElement(U,{path:"/newsletter"}),u.a.createElement(Z,{path:"/quote/:quoteSlug"}),u.a.createElement($,{path:"/author/:authorSlug"}),u.a.createElement(ne,{path:"/privacy-policy"}),u.a.createElement(ee,{path:"/hall-of-fame"}),u.a.createElement(te,{path:"/suggest-a-quote"}),u.a.createElement(ae,{path:"/of/humans"}))),u.a.createElement(se,null),u.a.createElement(ie,{modalCloseACtion:this.closeModal}))}}]),t}(u.a.Component));h.a.render(u.a.createElement(ue,null),document.getElementById("root"))},51:function(e,t,a){e.exports=a(102)}},[[51,1,2]]]);
//# sourceMappingURL=main.77ef7602.chunk.js.map