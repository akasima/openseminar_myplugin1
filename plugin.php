<?php
namespace OpenSeminar\MyPlugin1;

use XeFrontend;
use XePresenter;
use View;
use Route;
use Xpressengine\Http\Request;
use Xpressengine\Plugin\AbstractPlugin;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();
    }

    protected function route()
    {
        // implement code

        Route::fixed(
            $this->getId(),
            function () {
                Route::get(
                    '/',
                    [
                        'as' => 'openseminar_myplugin1::index',
                        'uses' => function (Request $request) {

                            $title = '오픈 세미나 플러그인1';

                            // set browser title
                            XeFrontend::title($title);

                            // load css file
                            XeFrontend::css($this->asset('assets/style.css'))->load();

                            /* Code1-3
                            //http://api.xpressengine.io/master/Xpressengine/Presenter/Html/FrontendHandler.html
                            XeFrontend::js($this->asset('assets/test1.js'))->load();
                            XeFrontend::js($this->asset('assets/test2.js'))->load();
                            EOF Code1-3 */

                            /* Code1-2
                            return View::make('openseminar_myplugin1::views.index', ['title' => $title]);
                            EOF Code1-2 */

                            // output
                            return XePresenter::make('openseminar_myplugin1::views.index', ['title' => $title]);

                        }
                    ]
                );
            }
        );

        /* Code1-1
        // 첫번째 세그먼트는 사용하지 않는게 좋음
        // 첫번째 세그먼트를 사용한 경우 xe.php  routing 에 추가
        // $baseConfig = include(__DIR__.'/../xe.php');
        // 'routing' => array_merge($baseConfig['xe']['routing'], ['myplugin1_route']),
        // 아래와 같은 방식을 추천하지 않습니다.
        Route::get(
            'myplugin1_route',
            function() {
                return 'text';
            }
        );
        EOF Code1-1 */

    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code

        parent::activate($installedVersion);
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code

        parent::install();
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @param string $installedVersion 이 플러그인의 현재 설치된 버전정보
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled($installedVersion = null)
    {
        // implement code

        return parent::checkInstalled($installedVersion);
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function update($installedVersion = null)
    {
        // implement code

        parent::update($installedVersion);
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @param string $currentVersion 현재 설치된 버전
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated($currentVersion = null)
    {
        return true;
    }

}
