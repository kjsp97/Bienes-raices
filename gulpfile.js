import path from 'path'
import fs from 'fs'
// import {glob} from 'glob'
import {src, dest, watch, series} from 'gulp'
import * as dartSass from 'sass'
import gulpSass from 'gulp-sass'
import terser from 'gulp-terser'
import cleanCSS from 'gulp-clean-css'
import sharp from 'sharp'


const sass = gulpSass(dartSass)

export function js(done) {
    src('src/js/*.js')
        .pipe(terser())
        .pipe(dest('build/js'));
    done()
}

export function css(done) {
    src('src/scss/app.scss', {sourcemaps: true})
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(dest('build/css', {sourcemaps: '.'}))
    done()
}

//Codigo Node.js para reducir tamaño y calidad de imagenes thumb
// export async function crop(done) {
//     const inputFolder = 'src/img/gallery/thumb'
//     const outputFolder = 'src/img/gallery/thumb';
//     const width = 300;
//     const height = 230;
//     if (!fs.existsSync(outputFolder)) {
//         fs.mkdirSync(outputFolder, { recursive: true })
//     }
//     const images = fs.readdirSync(inputFolder).filter(file => {
//         return /\.(jpg)$/i.test(path.extname(file));
//     });
//     try {
//         images.forEach(file => {
//             const inputFile = path.join(inputFolder, file)
//             const outputFile = path.join(outputFolder, file)
//             sharp(inputFile) 
//                 .resize(width, height, {
//                     position: 'centre'
//                 })
//                 .toFile(outputFile)
//         });

//         done()
//     } catch (error) {
//         console.log(error)
//     }
// }

// //Codigo Nodejs para transformar a webp y jpg
// export async function imagenes(done) {
//     const srcDir = './src/img';
//     const buildDir = './build/img';
//     const images =  await glob('./src/img/**/*{jpg,png}')

//     images.forEach(file => {
//         const relativePath = path.relative(srcDir, path.dirname(file));
//         const outputSubDir = path.join(buildDir, relativePath);
//         procesarImagenes(file, outputSubDir);
//     });
//     done();
// }
// //destino de transformar webp y jpg
// function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true })
    }
    const baseName = path.basename(file, path.extname(file))
    const extName = path.extname(file)
    const outputFile = path.join(outputSubDir, `${baseName}${extName}`)
    const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`)
    const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`)

    const options = { quality: 80 }
    sharp(file).jpeg(options).toFile(outputFile)
    sharp(file).webp(options).toFile(outputFileWebp)
    sharp(file).avif().toFile(outputFileAvif)
// }


export function dev() {
    watch('src/scss/**/*.scss', css); 
    watch('src/js/**/*.js', js); 
    // watch('src/img/**/*.{png,jpg}', imagenes); 
    
}

export default series(js, css, dev);
// añadir arriba (js, css, imagenes, crop, dev);

// export function testerFunction(done) {
//     console.log('from Gulp');
//     done();
// }
