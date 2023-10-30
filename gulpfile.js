//----------------------------------------------------------------------
//  モード
//----------------------------------------------------------------------
"use strict";

//----------------------------------------------------------------------
//  モジュール読み込み
//----------------------------------------------------------------------
const gulp = require("gulp");
const { src, dest, watch, series, parallel } = require("gulp");

const plumber = require("gulp-plumber");
const sassGlob = require("gulp-sass-glob-use-forward");
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require("gulp-autoprefixer");

const purgecss = require("gulp-purgecss");
const cleancss = require("gulp-clean-css");

const bs = require("browser-sync");
//----------------------------------------------------------------------
//  関数定義
//----------------------------------------------------------------------
function compile(done) {
    src("./src/scss/**/*.scss")
      .pipe(plumber())                   // watch中にエラーが発生してもwatchが止まらないようにする
      .pipe(sassGlob())                  // glob機能を使って@useや@forwardを省略する
      .pipe(sass())                      // sassのコンパイルをする
      .pipe(autoprefixer())              // ベンダープレフィックスを自動付与する
      .pipe(dest("./"));
  
    done();
  }
  function sasswatch(done){

  }
  function minify(done) {
    src(".*.css")
      .pipe(plumber())                              // watch中にエラーが発生してもwatchが止まらないようにする
      .pipe(purgecss({
        content: ["./src/*.html","./src/**/*.js"],  // src()のファイルで使用される可能性のあるファイルを全て指定
      }))
      .pipe(cleancss())                             // コード内の不要な改行やインデントを削除
      .pipe(dest("./"));
  
    done();
  }
  


  function bsInit(done) {
    bs.init({
      proxy: "localhost:10049",       // ローカルにある「Site Domain」に合わせる
      notify: false,                  // ブラウザ更新時に出てくる通知を非表示にする
      open: "external",               // ローカルIPアドレスでサーバを立ち上げる
    });
  
    done();
  }
  
  function bsReload(done) {
    bs.reload();
  
    done();
  }
  
//   function watchTask(done) {
//     watch(["./**", "!./*.css"], series(bsReload));    //	監視対象とするパスはお好みで
//     watch(['./srcsass/**/*.scss'], series(compile));

//   }"../assets/css/
  const watchTask = (done) => {
	watch(["./**", "!./style.css", "!./style_renew.css"], series(compile, bsReload));

	done();
};

//----------------------------------------------------------------------
//  タスク定義
//----------------------------------------------------------------------
exports.compile = series(compile, watchTask);
exports.minify = series(minify);
exports.bs = series(bsInit, bsReload, watchTask);
