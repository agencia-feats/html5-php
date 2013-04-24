<?php
namespace HTML5;

/**
 * Provide general element functions.
 *
 * @todo consider using a bitmask table lookup. There is enought overlap in
 *   naming that this could significantly shrink the size and maybe make it
 *   faster. See the Go teams implementation at https://code.google.com/p/go/source/browse/html/atom.
 */
class Elements {

  const TEXT_RAW = 0x01;
  const TEXT_RCDATA = 0x02;
  const OMIT_START = 0x0a;
  const OMIT_END = 0x0b;

  /**
   * The HTML5 elements as defined in http://dev.w3.org/html5/markup/elements.html.
   * @var array
   */
  public static $elements = array(
    "a" => 1,
    "abbr" => 1,
    "address" => 1,
    "area" => 1,
    "article" => 1,
    "aside" => 1,
    "audio" => 1,
    "b" => 1,
    "base" => 1,
    "bdi" => 1,
    "bdo" => 1,
    "blockquote" => 1,
    "body" => 1,
    "br" => 1,
    "button" => 1,
    "canvas" => 1,
    "caption" => 1,
    "cite" => 1,
    "code" => 1,
    "col" => 1,
    "colgroup" => 1,
    "command" => 1,
    //"data" => 1,    // This is highly experimental and only part of the whatwg spec (not w3c). See https://developer.mozilla.org/en-US/docs/HTML/Element/data
    "datalist" => 1,
    "dd" => 1,
    "del" => 1,
    "details" => 1,
    "dfn" => 1,
    "dialog" => 1,
    "div" => 1,
    "dl" => 1,
    "dt" => 1,
    "em" => 1,
    "embed" => 1,
    "fieldset" => 1,
    "figcaption" => 1,
    "figure" => 1,
    "footer" => 1,
    "form" => 1,
    "h1" => 1,
    "h2" => 1,
    "h3" => 1,
    "h4" => 1,
    "h5" => 1,
    "h6" => 1,
    "head" => 1,
    "header" => 1,
    "hgroup" => 1,
    "hr" => 1,
    "html" => 1,
    "i" => 1,
    "iframe" => 1,
    "img" => 1,
    "input" => 1,
    "kbd" => 1,
    "ins" => 1,
    "keygen" => 1,
    "label" => 1,
    "legend" => 1,
    "li" => 1,
    "link" => 1,
    "map" => 1,
    "mark" => 1,
    "menu" => 1,
    "meta" => 1,
    "meter" => 1,
    "nav" => 1,
    "noscript" => 1,
    "object" => 1,
    "ol" => 1,
    "optgroup" => 1,
    "option" => 1,
    "output" => 1,
    "p" => 1,
    "param" => 1,
    "pre" => 1,
    "progress" => 1,
    "q" => 1,
    "rp" => 1,
    "rt" => 1,
    "ruby" => 1,
    "s" => 1,
    "samp" => 1,
    "script" => 1,
    "section" => 1,
    "select" => 1,
    "small" => 1,
    "source" => 1,
    "span" => 1,
    "strong" => 1,
    "style" => 1,
    "sub" => 1,
    "summary" => 1,
    "sup" => 1,
    "table" => 1,
    "tbody" => 1,
    "td" => 1,
    "textarea" => 1,
    "tfoot" => 1,
    "th" => 1,
    "thead" => 1,
    "time" => 1,
    "title" => 1,
    "tr" => 1,
    "track" => 1,
    "u" => 1,
    "ul" => 1,
    "var" => 1,
    "video" => 1,
    "wbr" => 1,
  );

  /**
   * The MathML elements. See http://www.w3.org/wiki/MathML/Elements.
   *
   * In our case we are only concerned with presentation MathML and not content
   * MathML. There is a nice list of this subset at https://developer.mozilla.org/en-US/docs/MathML/Element.
   * 
   * @var array
   */
  public static $mathml = array(
    "maction" => 1,
    "maligngroup" => 1,
    "malignmark" => 1,
    "math" => 1,
    "menclose" => 1,
    "merror" => 1,
    "mfenced" => 1,
    "mfrac" => 1,
    "mglyph" => 1,
    "mi" => 1,
    "mlabeledtr" => 1,
    "mlongdiv" => 1,
    "mmultiscripts" => 1,
    "mn" => 1,
    "mo" => 1,
    "mover" => 1,
    "mpadded" => 1,
    "mphantom" => 1,
    "mroot" => 1,
    "mrow" => 1,
    "ms" => 1,
    "mscarries" => 1,
    "mscarry" => 1,
    "msgroup" => 1,
    "msline" => 1,
    "mspace" => 1,
    "msqrt" => 1,
    "msrow" => 1,
    "mstack" => 1,
    "mstyle" => 1,
    "msub" => 1,
    "msup" => 1,
    "msubsup" => 1,
    "mtable" => 1,
    "mtd" => 1,
    "mtext" => 1,
    "mtr" => 1,
    "munder" => 1,
    "munderover" => 1,
  );

  /**
   * Test if an element is a valid html5 element.
   *
   * @param string $name
   *   The name of the element.
   *
   * @return bool
   *   True if a html5 element and false otherwise.
   */
  public static function isHtml5Element($name) {

    // html5 element names are case insensetitive. Forcing lowercase for the check.
    // Do we need this check or will all data passed here already be lowercase?
    return isset(self::$elements[strtolower($name)]);
  }

  /**
   * Test if an element name is a valid MathML presentation element.
   *
   * @param string $name
   *   The name of the element.
   *
   * @return bool
   *   True if a MathML name and false otherwise.
   */
  public static function isMathMLElement($name) {

    // MathML is case-sensetitive unlike html5 elements.
    return isset(self::$mathml[$name]);
  }

  /**
   * Is an element name valid in an html5 document.
   *
   * This includes html5 elements along with other allowed embedded content
   * such as svg and mathml.
   * 
   * @param string $name 
   *   The name of the element.
   *
   * @return bool
   *   True if valid and false otherwise.
   */
  public function isElement($name) {
    return self::isHtml5Element($name) || self::isMathMLElement($name);
  }
}
