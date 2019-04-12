{-# LANGUAGE CPP #-}
{-# LANGUAGE NoRebindableSyntax #-}
{-# OPTIONS_GHC -fno-warn-missing-import-lists #-}
module Paths_Haskell (
    version,
    getBinDir, getLibDir, getDynLibDir, getDataDir, getLibexecDir,
    getDataFileName, getSysconfDir
  ) where

import qualified Control.Exception as Exception
import Data.Version (Version(..))
import System.Environment (getEnv)
import Prelude

#if defined(VERSION_base)

#if MIN_VERSION_base(4,0,0)
catchIO :: IO a -> (Exception.IOException -> IO a) -> IO a
#else
catchIO :: IO a -> (Exception.Exception -> IO a) -> IO a
#endif

#else
catchIO :: IO a -> (Exception.IOException -> IO a) -> IO a
#endif
catchIO = Exception.catch

version :: Version
version = Version [0,1,0,0] []
bindir, libdir, dynlibdir, datadir, libexecdir, sysconfdir :: FilePath

bindir     = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\bin"
libdir     = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\x86_64-windows-ghc-8.4.2\\Haskell-0.1.0.0-FzhBf3ZBzCxECoWZIleBNp-Haskell"
dynlibdir  = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\x86_64-windows-ghc-8.4.2"
datadir    = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\x86_64-windows-ghc-8.4.2\\Haskell-0.1.0.0"
libexecdir = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\Haskell-0.1.0.0-FzhBf3ZBzCxECoWZIleBNp-Haskell\\x86_64-windows-ghc-8.4.2\\Haskell-0.1.0.0"
sysconfdir = "C:\\Users\\zlatomir\\AppData\\Roaming\\cabal\\etc"

getBinDir, getLibDir, getDynLibDir, getDataDir, getLibexecDir, getSysconfDir :: IO FilePath
getBinDir = catchIO (getEnv "Haskell_bindir") (\_ -> return bindir)
getLibDir = catchIO (getEnv "Haskell_libdir") (\_ -> return libdir)
getDynLibDir = catchIO (getEnv "Haskell_dynlibdir") (\_ -> return dynlibdir)
getDataDir = catchIO (getEnv "Haskell_datadir") (\_ -> return datadir)
getLibexecDir = catchIO (getEnv "Haskell_libexecdir") (\_ -> return libexecdir)
getSysconfDir = catchIO (getEnv "Haskell_sysconfdir") (\_ -> return sysconfdir)

getDataFileName :: FilePath -> IO FilePath
getDataFileName name = do
  dir <- getDataDir
  return (dir ++ "\\" ++ name)
