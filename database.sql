USE [master]
GO
/****** Object:  Database [facaobem]    Script Date: 23/08/2022 23:43:29 ******/
CREATE DATABASE [facaobem]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'facaobem', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\facaobem.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'facaobem_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\facaobem_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [facaobem] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [facaobem].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [facaobem] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [facaobem] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [facaobem] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [facaobem] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [facaobem] SET ARITHABORT OFF 
GO
ALTER DATABASE [facaobem] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [facaobem] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [facaobem] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [facaobem] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [facaobem] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [facaobem] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [facaobem] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [facaobem] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [facaobem] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [facaobem] SET  DISABLE_BROKER 
GO
ALTER DATABASE [facaobem] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [facaobem] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [facaobem] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [facaobem] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [facaobem] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [facaobem] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [facaobem] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [facaobem] SET RECOVERY FULL 
GO
ALTER DATABASE [facaobem] SET  MULTI_USER 
GO
ALTER DATABASE [facaobem] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [facaobem] SET DB_CHAINING OFF 
GO
ALTER DATABASE [facaobem] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [facaobem] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [facaobem] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'facaobem', N'ON'
GO
ALTER DATABASE [facaobem] SET QUERY_STORE = OFF
GO
USE [facaobem]
GO
/****** Object:  Table [dbo].[instituicoes]    Script Date: 23/08/2022 23:43:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[instituicoes](
	[idInstituicao] [numeric](18, 0) IDENTITY(1,1) NOT NULL,
	[nome] [varchar](255) NULL,
	[descricao] [text] NULL,
	[cnpj] [varchar](18) NULL,
	[logradouro] [varchar](255) NULL,
	[numero] [varchar](20) NULL,
	[complemento] [varchar](150) NULL,
	[cep] [varchar](9) NULL,
	[bairro] [varchar](255) NULL,
	[municipio] [varchar](255) NOT NULL,
	[estado] [varchar](2) NOT NULL,
	[telefone] [varchar](25) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[deleted_at] [datetime] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[instituicoes] ON 
GO
INSERT [dbo].[instituicoes] ([idInstituicao], [nome], [descricao], [cnpj], [logradouro], [numero], [complemento], [cep], [bairro], [municipio], [estado], [telefone], [created_at], [updated_at], [deleted_at]) VALUES (CAST(1 AS Numeric(18, 0)), N'Teste', N'Dç1', N'02.991.032/0001-21', N'Rua Fonseca', N'123', N'Casa', N'90160-021', N'Vila Jardim', N'Porto Alegre', N'RS', N'(51) 99923-1234', CAST(N'2022-08-23T00:00:00.000' AS DateTime), NULL, NULL)
GO
INSERT [dbo].[instituicoes] ([idInstituicao], [nome], [descricao], [cnpj], [logradouro], [numero], [complemento], [cep], [bairro], [municipio], [estado], [telefone], [created_at], [updated_at], [deleted_at]) VALUES (CAST(2 AS Numeric(18, 0)), N'Teste 2', N'Asd', NULL, NULL, NULL, NULL, NULL, NULL, N'Canoas', N'RS', NULL, NULL, NULL, NULL)
GO
SET IDENTITY_INSERT [dbo].[instituicoes] OFF
GO
USE [master]
GO
ALTER DATABASE [facaobem] SET  READ_WRITE 
GO
