<?php
namespace Game;
class Game
{
    /**
     * Возврат контента по url
     * @param $url
     * @return bool|string
     */
    public function get_wiki_content($url)
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_MAXREDIRS => 3,
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }

    /**
     * Возврат заголовка страницы из Википедии
     * @return array|string|string[]
     */
    public function get_random_wikipedia_article()
    {
        $url = 'http://en.wikipedia.org/wiki/Special:Random';
        if (preg_match('/<title>(.*?)<\/title>/i', $this->get_wiki_content($url), $matches)) {
            $title = str_replace(' ', '_', str_replace(' - Wikipedia', '', $matches[1]));
        }
        return $title;
    }

    /**
     * Получить ссылку на начальную и конечную страницы
     * @return void
     */
    public function get_start_and_finish_wiki_links()
    {
        $params = [
            "action" => "query",
            "format" => "json",
            "titles" => $this->get_random_wikipedia_article(),
            "prop" => "links",
            "pllimit" => "1",
        ];

        $this->get_links($params);
    }

    /**
     * Получить ссылки на страницы
     * @return void
     */
    public function get_wiki_links()
    {
        $params = [
            "action" => "query",
            "format" => "json",
            "titles" => $_GET['title'],
            "prop" => "links",
            "pllimit" => "10",
        ];

        $this->get_links($params);
    }

    /**
     * Возврат 10 первых ссылок страницы с полученным заголовком
     * @return void
     */
    public function get_links($params)
    {
        $endpoint = "https://wikipedia.org/w/api.php";
        $url = $endpoint . "?" . http_build_query($params);

        $json = json_decode($this->get_wiki_content($url));
        $pageID = explode('|', $json->continue->plcontinue)[0];
        $links = $json->query->pages->$pageID->links;
        shuffle($links);

        if (isset($links)) {
            foreach ($links as $link) {
                echo "<a href='index.php?mode=start-game&title=" . $link->title . "'>" . $link->title . "</a></br>";
            }
        }
    }
}

