(window.webpackJsonpthatsthespirit=window.webpackJsonpthatsthespirit||[]).push([[0],{102:function(e,t,a){},103:function(e,t,a){"use strict";a.r(t);var n=a(4),l=a(5),o=a(8),r=a(6),c=a(10),s=a(9),i=a(0),u=a.n(i),m=a(21),h=a.n(m),d=a(11),p=a(43),g=a.n(p),f=a(44),E=a.n(f),b=a(45),v=a.n(b),C=a(46),y=a.n(C),w=a(105),N=a(106),O=a(107),k=a(23),j=a.n(k),q=j.a.create({baseURL:"http://localhost:8000/api/v1/",responseType:"json"}),S=function(e){var t=e.overlay,a=void 0===t||t,n=e.children;return a?u.a.createElement("div",{className:"Loader"},u.a.createElement("div",{className:"overlay"},u.a.createElement("div",{className:"loading-message"},u.a.createElement("div",{className:"spinner"}),u.a.createElement("div",{className:"loading-message-text"},n)))):u.a.createElement("div",{className:"Loader"},u.a.createElement("div",{className:"loading-message"},u.a.createElement("div",{className:"spinner"}),u.a.createElement("div",{className:"loading-message-text"},n)))},A=a(47),x=a.n(A),L=function(e){return x.a.decode("".concat(e.fullname," - ").concat(e.value))},I=function(e,t){var a=t.query,n=e.value,l=E()(n,a),o=v()(n,l);return u.a.createElement("div",{className:"quote-preview"},u.a.createElement("span",{className:"quote-preview-author"},e.photo?u.a.createElement("img",{alt:"",className:"tinythumb",src:"https://thatsthespir.it/uploads/".concat(e.photo)}):null,e.fullname),u.a.createElement("span",{className:"quote-preview-quote"}," \u2013",o.map((function(e,t){var a=e.highlight?"highlight":null;return u.a.createElement("span",{className:a,key:t},e.text.replace(/<[^>]+>/g,""))}))))},M=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).onChange=function(e,t){var n=t.newValue;t.method;a.setState({value:n})},a.onSuggestionSelectedHandler=function(e,t){var n=t.suggestion;t.suggestionValue,t.suggestionIndex,t.sectionIndex,t.method;a.props.setQuoteHandler(n),Object(d.c)("/"+n.url),a.setState({value:""})},a.onSuggestionsFetchRequested=function(e){var t=e.value;t.length>3&&(a.setState({loading:!0}),q.get("https://api.thatsthespir.it/v1/quotes/search?query=".concat(t)).then((function(e){return e.data.suggestions})).then((function(e){a.setState({suggestions:e,loading:!1})})).catch((function(e){return console.log(e),null})))},a.onSuggestionsClearRequested=function(){a.setState({suggestions:[],loading:void 0,value:""})},a.inputReference=function(e){null!==e&&(a.input=e.input)},a.state={value:"",suggestions:[],loading:void 0},a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){var e=this,t=this.state,a=t.value,n=t.suggestions,l={placeholder:"Search for a quote or author name",value:a,onChange:this.onChange};return u.a.createElement("section",{className:"search"},u.a.createElement(y.a,{handleKeys:["ctrl+f"],onKeyEvent:function(t,a){return e.input.focus()}}),u.a.createElement(w.a,{className:"content"},u.a.createElement(N.a,null,u.a.createElement(O.a,{xs:12},this.state.loading?u.a.createElement(S,{overlay:"false"},"Searching..."):null,u.a.createElement("h1",{className:"ui-title topline"},"search"),u.a.createElement(g.a,{ref:this.inputReference,suggestions:n,onSuggestionsFetchRequested:this.onSuggestionsFetchRequested,onSuggestionsClearRequested:this.onSuggestionsClearRequested,onSuggestionSelected:this.onSuggestionSelectedHandler,getSuggestionValue:L,renderSuggestion:I,inputProps:l})))))}}]),t}(u.a.Component),T=a(19),_=a(49),D=a.n(_),H=a(24),R=a.n(H),Q=a(25),F=a.n(Q),B=a(50),P=a.n(B),W=a(51),G=a.n(W),Z=function(e){function t(){return Object(n.a)(this,t),Object(o.a)(this,Object(r.a)(t).apply(this,arguments))}return Object(s.a)(t,e),Object(l.a)(t,[{key:"isBrowser",value:function(){return!("undefined"===typeof document||"undefined"===typeof window)}},{key:"render",value:function(){var e="/"+this.props.quote.url,t={url:e,text:this.props.quote.body},a=Object(T.a)({},t),n=Object(T.a)({},t,{imagePath:"/uploads/"+this.props.quote.photo}),l=Object(T.a)({},t,{title:this.props.quote.fullname}),o={url:e,total_likes:this.props.quote.total};return u.a.createElement("p",{className:"share-buttons"},u.a.createElement("a",{className:"quote-permalink",href:e},"#",this.props.quote.quote_id),u.a.createElement("span",{className:"horiz-sep"},"|"),this.props.quote.source?u.a.createElement("span",{className:"source"},u.a.createElement("a",{target:"_blank",rel:"noopener noreferrer",href:this.props.quote.source},"source"),u.a.createElement("span",{className:"horiz-sep"},"|")):null,u.a.createElement(V,{url:e}),u.a.createElement(z,a),u.a.createElement(J,n),u.a.createElement(K,l),u.a.createElement(Y,t),u.a.createElement("span",{className:"horiz-sep"},"|"),u.a.createElement(U,o))}}]),t}(i.Component),V=function(e){var t=e.url;return u.a.createElement("a",{rel:"nofollow",className:"social facebook",href:"//www.facebook.com/sharer/sharer.php?u=".concat(t),title:"Share this quote on Facebook"},u.a.createElement(D.a,null))},z=function(e){var t=e.url,a=e.text;return u.a.createElement("a",{rel:"nofollow",className:"social twitter",href:"http://twitter.com/share?text=".concat(a,"&amp;url=").concat(t,"&amp;hashtags=design_quote"),title:"Share this quote on Twitter"},u.a.createElement(R.a,null))},Y=function(e){var t=e.url,a=e.text;return u.a.createElement("a",{rel:"nofollow",className:"social reddit","data-height":"420","data-network":"reddit","data-width-normal":"540","data-width":"845",href:"//www.reddit.com/submit?url=".concat(t,"&amp;title=").concat(a),title:"Share this quote on Reddit"},u.a.createElement(F.a,null))},J=function(e){var t=e.url,a=(e.text,e.imagePath);return u.a.createElement("a",{rel:"nofollow",className:"social pinterest",href:"https://pinterest.com/pin/create/button/?url=".concat(t,"&amp;media=").concat(a,"&amp;description=").concat(t),title:"Share this quote on Pinterest"},u.a.createElement(P.a,null))},K=function(e){var t=e.url,a=e.text,n=e.title;return u.a.createElement("a",{rel:"nofollow",className:"social linkedin",href:"https://www.linkedin.com/shareArticle?mini=true&amp;url=".concat(t,"&amp;title=").concat(n,"&amp;summary=").concat(a,"&amp;source=").concat(t),title:"Share this quote on LinkedIn"},u.a.createElement(G.a,null))},U=function(e){var t=e.url,a=e.total_likes;return u.a.createElement("a",{rel:"nofollow",className:"social favourite",href:"".concat(t,"#login-ui"),title:"Favourite this quote so you can easily find it later. "},u.a.createElement("em",null,"Save it ?"),u.a.createElement("span",{className:"total_likes"},a))},X=Z;var $=function(e){var t=e.showAuthor,a=e.quote,n=Object(T.a)({},a),l=n.body,o=n.fullname,r=n.author_slug,c=n.photo,s=n.total;return u.a.createElement("div",{className:"quote single-quote"},u.a.createElement("blockquote",{className:""},u.a.createElement("span",{className:"guillemets"}),u.a.createElement("span",{className:"the-quote",dangerouslySetInnerHTML:{__html:l}}),u.a.createElement("span",{className:"pilcrow"},"|")),t?u.a.createElement("div",{className:"author"},u.a.createElement("div",{className:"photo",style:c?{backgroundImage:"url(/uploads/".concat(c,")")}:null}),u.a.createElement("address",{className:"author"},"\u2013\xa0",u.a.createElement("a",{title:"All quotes by ".concat(o),href:"/author/".concat(r),rel:"author",className:"authorName"},o,u.a.createElement("br",null),u.a.createElement("small",{className:"meta"},s," quote",s>1?"s":null)))):null,u.a.createElement(X,{quote:a}))};function ee(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;window.scroll(0,0),e.url.substring("author/")?(this.fetchData(e.url+"?fields=quotes",t),Object(d.c)("/"+e.url,{state:{data:e}})):this.setState({data:e,loading:!1})}function te(e){var t=this,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;this.setState({loading:!0});try{if("quote/random"===e)e+="?random="+(new Date).getTime();q.get(e).then((function(e){t.setState({loading:!1,data:e.data},a)})).catch((function(e){return null}))}catch(n){alert("\ud83d\ude31 Axios request failed: ".concat(n))}}var ae=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).fetchData=te.bind(Object(c.a)(a)),a.setQuoteFromSearch=ee.bind(Object(c.a)(a)),a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement(u.a.Fragment,null,u.a.createElement($,{quote:this.props.quote,showAuthor:!0}),u.a.createElement(M,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),ne=function(){return u.a.createElement(w.a,{className:"content"},u.a.createElement(N.a,null,u.a.createElement(O.a,null,u.a.createElement("h1",{className:"topline"},"A daily dose of Spirit in your mailbox to start the day?"))),u.a.createElement(N.a,null,u.a.createElement(O.a,{md:3},u.a.createElement("img",{src:"/assets/images/Screenshot_2015-06-01-23-34-00.png",alt:"",style:{maxWidth:"100%"},className:"image-drop-shadow"})),u.a.createElement(O.a,{md:9},u.a.createElement("p",null,"Receive a quote from The Spirit! in your mailbox every day in the morning. It will make you feel..."),u.a.createElement("p",null,"Mmmmmmmmmh, nice."),u.a.createElement("p",null,"Like that."),u.a.createElement("div",{id:"mc_embed_signup"},u.a.createElement("form",{action:"//pixeline.us2.list-manage.com/subscribe/post?u=47aa7bd611cb197be236cd3b2&id=8a917f2ce3",method:"post",id:"mc-embedded-subscribe-form"},u.a.createElement("div",{id:"mc_embed_signup_scroll"},u.a.createElement("div",{className:"mc-field-group"},u.a.createElement("label",null,"Your Email Address"),u.a.createElement("input",{type:"email",name:"EMAIL",className:"required email",id:"mce-EMAIL","aria-required":"true"})),u.a.createElement("p",{className:"meta"},"Powered by ",u.a.createElement("a",{href:"http://eepurl.com/N-Z79",title:"MailChimp - email marketing made easy and fun"},"MailChimp"),u.a.createElement("br",null),u.a.createElement("small",null,"(Each email contains an unsubscribe link, should this ever get annoying.)")),u.a.createElement("div",{style:{position:"absolute",left:"-5000px"}},u.a.createElement("input",{type:"text",name:"b_47aa7bd611cb197be236cd3b2_8a917f2ce3",tabIndex:"-1"})),u.a.createElement("div",{className:"clear"},u.a.createElement("input",{type:"submit",value:"Subscribe",name:"subscribe",id:"mc-embedded-subscribe",className:"button"}))))))))},le=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).fetchData=te.bind(Object(c.a)(a)),a.setQuoteFromSearch=ee.bind(Object(c.a)(a)),a.state={data:{},loading:void 0},a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){!this.state.data.body&&this.props.quoteSlug&&this.fetchData("/quote/"+this.props.quoteSlug)}},{key:"render",value:function(){return u.a.createElement(u.a.Fragment,null,u.a.createElement($,{quote:this.state.data,showAuthor:!0}),u.a.createElement(M,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),oe=function(e){function t(){var e,a;Object(n.a)(this,t);for(var l=arguments.length,c=new Array(l),s=0;s<l;s++)c[s]=arguments[s];return(a=Object(o.a)(this,(e=Object(r.a)(t)).call.apply(e,[this].concat(c)))).stickyOnScroll=function(){var e=document.body.scrollTop||document.documentElement.scrollTop,t=document.getElementById("stickyHeader"),a=document.querySelector(".sticky--clone"),n=t.scrollHeight+200;a&&(a.classList=e>n?"sticky--clone sticky":"sticky--clone")},a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){window.addEventListener("scroll",this.stickyOnScroll)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("scroll",this.stickyOnScroll)}},{key:"render",value:function(){var e=this.props.author;return u.a.createElement(u.a.Fragment,null,u.a.createElement("header",{id:"stickyHeader"},u.a.createElement("h1",{className:"ui-title topline"},"Quotes by ",e.fullname," "),u.a.createElement("figure",{className:"author"},u.a.createElement("div",{id:"photo",className:"photo ","data-author":"{author.fullname}",style:e.photo?{backgroundImage:"url(https://thatsthespir.it/uploads/".concat(e.photo,")")}:null}),u.a.createElement("figcaption",null,e.fullname," ",u.a.createElement("br",null),u.a.createElement("small",{className:"meta contribution"},e.total," quote",e.total>1?"s":null)))),u.a.createElement("header",{className:"sticky--clone"},u.a.createElement("h1",{className:"ui-title topline"},"Quotes by ",e.fullname," "),u.a.createElement("figure",{className:"author"},u.a.createElement("div",{id:"photo",className:"photo ","data-author":"{author.fullname}",style:e.photo?{backgroundImage:"url(https://thatsthespir.it/uploads/".concat(e.photo,")")}:null}),u.a.createElement("figcaption",null,e.fullname," ",u.a.createElement("br",null),u.a.createElement("small",{className:"meta contribution"},e.total," quote",e.total>1?"s":null)))))}}]),t}(u.a.Component),re=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).state={data:{},loading:void 0},a.fetchData=te.bind(Object(c.a)(a)),a.setQuoteFromSearch=ee.bind(Object(c.a)(a)),a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){this.fetchData("/author/"+this.props.authorSlug+"?fields=quotes")}},{key:"componentWillReceiveProps",value:function(e){}},{key:"render",value:function(){var e=this.state.data.quotes;return u.a.createElement("div",{className:"content"},this.state.loading?u.a.createElement(S,null,"Mmmh, let me think..."):null,u.a.createElement("div",{id:"stickyHeaderContainer"},u.a.createElement(oe,{author:this.state.data})),u.a.createElement("div",{className:"author-quotes"},e&&e.map((function(e,t){return u.a.createElement("div",{key:t},u.a.createElement($,{quote:e,showAuthor:!1}),u.a.createElement("span",{className:"sep"},"\u292b"))}))),u.a.createElement(M,{setQuoteHandler:this.setQuoteFromSearch}))}}]),t}(u.a.Component),ce=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"Hall of Fame"))},se=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"Suggest a quote"))},ie=function(){return u.a.createElement("main",{className:"hall-of-fame"},u.a.createElement("h1",null,"All authors"))},ue=function(){return u.a.createElement("main",{className:"privacy-policy"},u.a.createElement("h1",{className:"topline"},"Privacy Policy"),u.a.createElement("div",{className:"content"},u.a.createElement("strong",null,"Like millions of other website owners, I use Google Analytics on That's The Spirit!."),"Google Analytics is a piece of software that grabs data about my visitors (you). It\u2019s something like an advanced server log.",u.a.createElement("h2",null,"What does Google Analytics record?"),u.a.createElement("ul",null,u.a.createElement("li",null,"What website you came from to get here."),u.a.createElement("li",null,"How long you stay for."),u.a.createElement("li",null,"What kind of computer you\u2019re using."),u.a.createElement("li",null,"And quite a bit more.")),u.a.createElement("h2",null,"What do I do with your data?"),"The tracking information allows me to better understand the kind of people who come to my site and what content they\u2019re reading. This allows me to make better decisions about design and writing. Occasionally, I will compile aggregate statistics about the number of visitors this site receives and browsers being used. No personally identifying data is included in this type of reporting. All of my activity falls within the bounds of the\xa0",u.a.createElement("a",{href:"http://www.google.com/analytics/tos.html"},"Google Analytics Terms of Service"),".",u.a.createElement("strong",null,"Want to opt out of tracking?"),"You can ",u.a.createElement("a",{href:"http://www.google.com/privacy_ads.html"},"opt out of Google\u2019s advertising tracking cookie")," or ",u.a.createElement("a",{href:"http://tools.google.com/dlpage/gaoptout?hl=en"},"use a browser plugin to opt out of all Google Analytics tracking software.")))},me=a(108),he=a(109),de=function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).state={logged_in:!1,user:{}},a.refreshAfterLogin=a.refreshAfterLogin.bind(Object(c.a)(a)),a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"refreshAfterLogin",value:function(e){console.log("Child says",e),this.setState({actionCount:this.state.actionCount+1})}},{key:"render",value:function(){return u.a.createElement(w.a,{className:"header"},u.a.createElement(N.a,{className:"justify-content-between"},u.a.createElement(O.a,{xs:12,md:3,className:"col-auto mr-auto"},u.a.createElement(me.a.Brand,{as:d.a,to:"/",className:"mr-auto mt-3",onClick:this.props.homeButtonAction},"That's the spirit!",u.a.createElement("br",null),u.a.createElement("small",null,"Inspirational quotes for the creative soul."))),u.a.createElement(O.a,{xs:12,md:6,className:"col-auto"},u.a.createElement(me.a,{expand:"md",variant:"light",bg:"white",className:"pr-0"},u.a.createElement(me.a.Toggle,{"aria-controls":"responsive-navbar-nav",id:"toggle-button"}),u.a.createElement(me.a.Collapse,{id:"responsive-navbar-nav"},u.a.createElement(he.a,{as:"ul",id:"main-menu",className:"pr-0 ml-auto"},u.a.createElement(he.a.Item,{as:"li"},u.a.createElement(he.a.Link,{as:d.a,to:"/newsletter",style:{position:"relative"}},"Daily",u.a.createElement("span",{className:"badge",title:"You (will) have new mail!"},"1"))),u.a.createElement(he.a.Item,{as:"li"},u.a.createElement(he.a.Link,{as:d.a,to:"/suggest-a-quote",onClick:this.props.suggestAQuoteAction},"Suggest a Quote")),u.a.createElement(he.a.Item,{as:"li",className:"pr-0 "},u.a.createElement(he.a.Link,{as:d.a,to:"/hall-of-fame"},"Favs Chart"))))))))}}]),t}(u.a.Component);function pe(){return(pe=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var n in a)Object.prototype.hasOwnProperty.call(a,n)&&(e[n]=a[n])}return e}).apply(this,arguments)}function ge(e,t){if(null==e)return{};var a,n,l=function(e,t){if(null==e)return{};var a,n,l={},o=Object.keys(e);for(n=0;n<o.length;n++)a=o[n],t.indexOf(a)>=0||(l[a]=e[a]);return l}(e,t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(n=0;n<o.length;n++)a=o[n],t.indexOf(a)>=0||Object.prototype.propertyIsEnumerable.call(e,a)&&(l[a]=e[a])}return l}var fe=u.a.createElement("g",{id:"Page-1",stroke:"none",strokeWidth:1,fill:"none",fillRule:"evenodd"},u.a.createElement("g",{id:"hand",fill:"#9B9B9B"},u.a.createElement("g",{id:"Page-1"},u.a.createElement("path",{d:"M27.21875,19.46875 C29.0937594,19.8229184 30.4166628,20.6145772 31.1875,21.84375 C31.9583372,23.0729228 32.34375,25.0104034 32.34375,27.65625 C32.34375,32.9062763 30.7656408,37.2031083 27.609375,40.546875 C24.4531092,43.8906417 20.4166912,45.5625 15.5,45.5625 C13.5624903,45.5625 11.6823008,45.2135452 9.859375,44.515625 C8.03644922,43.8177048 6.46875656,42.8437563 5.15625,41.59375 C3.6562425,40.2187431 2.53125375,38.7656327 1.78125,37.234375 C1.03124625,35.7031173 0.65625,34.1354247 0.65625,32.53125 C0.65625,30.7395744 1.04166281,29.3541716 1.8125,28.375 C2.58333719,27.3958284 3.802075,26.7291684 5.46875,26.375 C5.15624844,25.6458297 4.92708406,25.0312525 4.78125,24.53125 C4.63541594,24.0312475 4.5625,23.6458347 4.5625,23.375 C4.5625,22.4374953 5.05728672,21.4791716 6.046875,20.5 C7.03646328,19.5208284 7.96874562,19.03125 8.84375,19.03125 C9.21875188,19.03125 9.61458125,19.0989577 10.03125,19.234375 C10.4479187,19.3697923 10.9270806,19.5937484 11.46875,19.90625 C9.86457531,15.3645606 8.69792031,11.8593873 7.96875,9.390625 C7.23957969,6.92186266 6.875,5.21875469 6.875,4.28125 C6.875,2.98957688 7.20833,1.96354547 7.875,1.203125 C8.54167,0.442704531 9.44791094,0.0625 10.59375,0.0625 C12.5520931,0.0625 15.031235,4.43745625 18.03125,13.1875 C18.5520859,14.6875075 18.9479153,15.8437459 19.21875,16.65625 C19.4479178,16.0104134 19.7708313,15.0937559 20.1875,13.90625 C23.187515,5.23954 25.7708225,0.90625 27.9375,0.90625 C29.0000053,0.90625 29.8489552,1.26562141 30.484375,1.984375 C31.1197948,2.70312859 31.4375,3.66666063 31.4375,4.875 C31.4375,5.79167125 31.0885452,7.46873781 30.390625,9.90625 C29.6927048,12.3437622 28.6354237,15.5312303 27.21875,19.46875 L27.21875,19.46875 L27.21875,19.46875 Z M24.96875,18.9375 C26.3645903,15.1458144 27.4531211,12.0156373 28.234375,9.546875 C29.0156289,7.07811266 29.40625,5.56250281 29.40625,5 C29.40625,4.39583031 29.276043,3.927085 29.015625,3.59375 C28.755207,3.260415 28.3958356,3.09375 27.9375,3.09375 C27.3541637,3.09375 26.7604197,3.57812016 26.15625,4.546875 C25.5520803,5.51562984 24.8854203,7.07290594 24.15625,9.21875 L21.03125,18.25 L24.96875,18.9375 L24.96875,18.9375 Z M17.28125,17.875 L13.90625,8.125 C13.0312456,5.64582094 12.3541691,4.02604547 11.875,3.265625 C11.3958309,2.50520453 10.8750028,2.125 10.3125,2.125 C9.87499781,2.125 9.52083469,2.291665 9.25,2.625 C8.97916531,2.958335 8.84375,3.40624719 8.84375,3.96875 C8.84375,4.92708813 9.20832969,6.59373813 9.9375,8.96875 C10.6666703,11.3437619 11.7604094,14.4583141 13.21875,18.3125 C13.3437506,18.0833322 13.5208322,17.9218755 13.75,17.828125 C13.9791678,17.7343745 14.2916647,17.6875 14.6875,17.6875 C14.8125006,17.6875 15.0624981,17.6979166 15.4375,17.71875 C15.8125019,17.7395834 16.4270791,17.7916662 17.28125,17.875 L17.28125,17.875 L17.28125,17.875 Z M20.8125,27.34375 C19.9166622,27.3020831 19.0677123,27.2083341 18.265625,27.0625 C17.4635377,26.9166659 16.6979203,26.7083347 15.96875,26.4375 C16.302085,27.10417 16.598957,27.77083 16.859375,28.4375 C17.119793,29.10417 17.3333325,29.7604134 17.5,30.40625 C18.0000025,29.7812469 18.5260389,29.2135442 19.078125,28.703125 C19.6302111,28.1927058 20.2083303,27.7395853 20.8125,27.34375 L20.8125,27.34375 L20.8125,27.34375 Z M4.84375,32.21875 C5.13541813,32.5729184 5.54166406,33.0937466 6.0625,33.78125 C7.43750687,35.6770928 8.7083275,36.625 9.875,36.625 C10.2708353,36.625 10.6249984,36.5000012 10.9375,36.25 C11.2500016,35.9999988 11.40625,35.7395847 11.40625,35.46875 C11.40625,35.1562484 11.1979187,34.6354203 10.78125,33.90625 C10.3645813,33.1770797 9.79167031,32.3541712 9.0625,31.4375 C8.2291625,30.3749947 7.53646109,29.5989608 6.984375,29.109375 C6.43228891,28.6197892 5.989585,28.375 5.65625,28.375 C4.92707969,28.375 4.25521141,28.7656211 3.640625,29.546875 C3.02603859,30.3281289 2.71875,31.2499947 2.71875,32.3125 C2.71875,33.1666709 2.93228953,34.1197864 3.359375,35.171875 C3.78646047,36.2239636 4.40624594,37.2812447 5.21875,38.34375 C6.44792281,39.9895916 7.97394922,41.2552039 9.796875,42.140625 C11.6198008,43.0260461 13.6354056,43.46875 15.84375,43.46875 C19.9062703,43.46875 23.307278,41.9531402 26.046875,38.921875 C28.786472,35.8906098 30.15625,32.0937728 30.15625,27.53125 C30.15625,26.1354097 30.0520844,25.0260458 29.84375,24.203125 C29.6354156,23.3802042 29.2916691,22.7812519 28.8125,22.40625 C27.9583291,21.6979131 26.2968873,21.0625028 23.828125,20.5 C21.3593627,19.9374972 18.7812634,19.65625 16.09375,19.65625 C15.3437462,19.65625 14.8125016,19.7812487 14.5,20.03125 C14.1874984,20.2812512 14.03125,20.7083303 14.03125,21.3125 C14.03125,22.7291737 14.8229088,23.7552052 16.40625,24.390625 C17.9895912,25.0260448 20.5520656,25.34375 24.09375,25.34375 L25.375,25.34375 C25.6666681,25.34375 25.9010408,25.4531239 26.078125,25.671875 C26.2552092,25.8906261 26.3749997,26.2187478 26.4375,26.65625 C26.0833316,26.989585 25.3541722,27.3697895 24.25,27.796875 C23.1458278,28.2239605 22.3020863,28.6458313 21.71875,29.0625 C20.4687438,29.9791712 19.4635455,31.067702 18.703125,32.328125 C17.9427045,33.588548 17.5625,34.7812444 17.5625,35.90625 C17.5625,36.5937534 17.7239567,37.4218702 18.046875,38.390625 C18.3697933,39.3593798 18.53125,39.9583322 18.53125,40.1875 L18.53125,40.40625 L18.46875,40.6875 C17.5520787,40.6249997 16.8281277,40.0885467 16.296875,39.078125 C15.7656223,38.0677033 15.5,36.7187584 15.5,35.03125 L15.5,34.75 C15.3333325,34.8958341 15.1718758,34.9999997 15.015625,35.0625 C14.8593742,35.1250003 14.6875009,35.15625 14.5,35.15625 C14.3124991,35.15625 14.1354175,35.1406252 13.96875,35.109375 C13.8020825,35.0781248 13.6145844,35.0312503 13.40625,34.96875 C13.4687503,35.1979178 13.5156248,35.4218739 13.546875,35.640625 C13.5781252,35.8593761 13.59375,36.0312494 13.59375,36.15625 C13.59375,36.9270872 13.2916697,37.5885389 12.6875,38.140625 C12.0833303,38.6927111 11.3645875,38.96875 10.53125,38.96875 C9.21874344,38.96875 7.88542344,38.3281314 6.53125,37.046875 C5.17707656,35.7656186 4.5,34.5104228 4.5,33.28125 C4.5,33.0520822 4.52604141,32.8489592 4.578125,32.671875 C4.63020859,32.4947908 4.71874938,32.3437506 4.84375,32.21875 L4.84375,32.21875 L4.84375,32.21875 Z M14.21875,32.96875 C14.5729184,32.96875 14.8958319,32.8072933 15.1875,32.484375 C15.4791681,32.1614567 15.625,31.8125019 15.625,31.4375 C15.625,31.0416647 15.3385445,30.1197989 14.765625,28.671875 C14.1927055,27.2239511 13.4791709,25.8020903 12.625,24.40625 C11.9999969,23.3645781 11.3854197,22.5781277 10.78125,22.046875 C10.1770803,21.5156223 9.60416938,21.25 9.0625,21.25 C8.62499781,21.25 8.14062766,21.5260389 7.609375,22.078125 C7.07812234,22.6302111 6.8125,23.1458309 6.8125,23.625 C6.8125,24.1250025 7.07291406,24.874995 7.59375,25.875 C8.11458594,26.875005 8.81249562,27.9374944 9.6875,29.0625 C10.6041712,30.2916728 11.4687459,31.2499966 12.28125,31.9375 C13.0937541,32.6250034 13.7395809,32.96875 14.21875,32.96875 L14.21875,32.96875 L14.21875,32.96875 Z",id:"hand"})))),Ee=function(e){var t=e.svgRef,a=e.title,n=ge(e,["svgRef","title"]);return u.a.createElement("svg",pe({width:"33px",height:"46px",viewBox:"0 0 33 46",ref:t},n),a?u.a.createElement("title",null,a):null,fe)},be=u.a.forwardRef((function(e,t){return u.a.createElement(Ee,pe({svgRef:t},e))})),ve=(a.p,function(e){function t(){return Object(n.a)(this,t),Object(o.a)(this,Object(r.a)(t).apply(this,arguments))}return Object(s.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement("footer",{className:"footer"},u.a.createElement("p",null,u.a.createElement(d.a,{to:"/newsletter"},"The Spirit! by email ?")," -",u.a.createElement(d.a,{to:"/privacy-policy"},"Privacy policy")," -",u.a.createElement(d.a,{to:"/of/humans"},"All Authors")," - Made by some ",u.a.createElement("a",{href:"https://pixeline.be",title:"Brussels web agency"},"web designer in Brussels"),u.a.createElement("br",null),u.a.createElement(be,{alt:"V for Victory hand sign",className:"hand"})))}}]),t}(u.a.Component)),Ce=function(e){function t(){var e,a;Object(n.a)(this,t);for(var l=arguments.length,c=new Array(l),s=0;s<l;s++)c[s]=arguments[s];return(a=Object(o.a)(this,(e=Object(r.a)(t)).call.apply(e,[this].concat(c)))).state={clicked:!1},a.tryToLogin=function(){a.setState({clicked:!0}),j.a.get("http://localhost:8000/auth?provider=".concat(a.props.provider,"&redirectTo=localhost:3000/newsletter")).then((function(e){console.log(e),a.setState({clicked:!1})}))},a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement("a",{href:this.props.url,provider:this.props.provider,className:"no-underline"},this.props.children,u.a.createElement("br",null),this.props.label)}}]),t}(u.a.Component),ye=a(56),we=a.n(ye),Ne=a(57),Oe=a.n(Ne),ke=function(e){function t(){return Object(n.a)(this,t),Object(o.a)(this,Object(r.a)(t).apply(this,arguments))}return Object(s.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return u.a.createElement("section",{className:"modal--show",id:"login-ui",tabIndex:"-1",role:"dialog","aria-labelledby":"modal-label","aria-hidden":"true"},u.a.createElement("a",{href:"/#!",className:"modal-close",onClick:this.props.modalCloseACtion,title:"Click to close this.","data-close":"Close","data-dismiss":"modal"},"?"),u.a.createElement("div",{className:"modal-inner"},u.a.createElement("div",{className:"modal-content"},u.a.createElement("p",null,"To do that, you need to log in the Spirit via one of these services. It only takes a click and you're good to go."),u.a.createElement("ul",{className:"single-signon-providers"},u.a.createElement("li",null,u.a.createElement(Ce,{url:"http://localhost:8000/auth?provider=google&redirectTo=localhost:3000/newsletter",provider:"google",label:"Google"},u.a.createElement(Oe.a,{title:"alt title for google icon"}))),u.a.createElement("li",null,u.a.createElement(Ce,{provider:"github",label:"GitHub"},u.a.createElement(we.a,null))),u.a.createElement("li",null,u.a.createElement(Ce,{provider:"reddit",label:"Reddit"},u.a.createElement(F.a,null))),u.a.createElement("li",null,u.a.createElement(Ce,{provider:"twitter",label:"Twitter"},u.a.createElement(R.a,null)))))))}}]),t}(u.a.Component),je=(a(102),function(e){function t(e){var a;return Object(n.a)(this,t),(a=Object(o.a)(this,Object(r.a)(t).call(this,e))).goHome=function(e){e.preventDefault(),a.fetchData("quote/random"),Object(d.c)("/"),window.scroll(0,0)},a.suggestAQuoteAction=function(e){a.showModal(e)},a.showModal=function(e){e.preventDefault(),document.getElementById("login-ui").setAttribute("class","modal--show is-active")},a.closeModal=function(e){e.preventDefault(),document.getElementById("login-ui").setAttribute("class","modal--show")},a.state={data:{},loading:void 0},a.goHome=a.goHome.bind(Object(c.a)(a)),a.fetchData=te.bind(Object(c.a)(a)),a}return Object(s.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){this.fetchData("quote/random")}},{key:"render",value:function(){return u.a.createElement("div",{className:"wrapper",id:"TheSpirit"},u.a.createElement(de,{homeButtonAction:this.goHome,suggestAQuoteAction:this.suggestAQuoteAction}),u.a.createElement("div",{id:"content",className:this.state.loading?'"loading"':null},this.state.loading?u.a.createElement(S,null,"Mmmh, let me think..."):null,u.a.createElement(d.b,null,u.a.createElement(ae,{path:"/",quote:this.state.data}),u.a.createElement(ne,{path:"/newsletter"}),u.a.createElement(le,{path:"/quote/:quoteSlug"}),u.a.createElement(re,{path:"/author/:authorSlug"}),u.a.createElement(ue,{path:"/privacy-policy"}),u.a.createElement(ce,{path:"/hall-of-fame"}),u.a.createElement(se,{path:"/suggest-a-quote"}),u.a.createElement(ie,{path:"/of/humans"}))),u.a.createElement(ve,null),u.a.createElement(ke,{modalCloseACtion:this.closeModal}))}}]),t}(u.a.Component));h.a.render(u.a.createElement(je,null),document.getElementById("root"))},24:function(e,t,a){e.exports=a.p+"static/media/twitter.0422f361.svg"},25:function(e,t,a){e.exports=a.p+"static/media/reddit.5ae00145.svg"},49:function(e,t,a){e.exports=a.p+"static/media/facebook.7c9789fc.svg"},50:function(e,t,a){e.exports=a.p+"static/media/pinterest.d7f2689a.svg"},51:function(e,t,a){e.exports=a.p+"static/media/linkedin.c0096a26.svg"},56:function(e,t,a){e.exports=a.p+"static/media/github.90f2c11f.svg"},57:function(e,t,a){e.exports=a.p+"static/media/google.bf1ae9dd.svg"},58:function(e,t,a){e.exports=a(103)}},[[58,1,2]]]);
//# sourceMappingURL=main.6a1b757f.chunk.js.map